<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Villageofficer;
use Illuminate\Http\Request;

class UserController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::with('villageofficer','role')->orderBy('created_at','desc')->get(); 
        return view('pages.admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::get();
        $village_officer = Villageofficer::get();
        
        return view('pages.admin.user.create',compact('role','village_officer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role_id' => $request->role_id,
                'village_officer_id' => $request->village_officer_id,
            ];
            $create = User::create($data);
            return redirect()->route('user.index');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $role = Role::get();
            $village_officer = Villageofficer::get();
            $show = User::findOrFail($id);
            return view('pages.admin.user.edit',compact('show','role','village_officer'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        try {
            if($request->password == null){
                $passwordbaru = $request->password2;
            }else{
                $passwordbaru = $request->password;
            }
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $passwordbaru,
                'role_id' => $request->role_id,
                'village_officer_id' => $request->village_officer_id,
            ];
            $update = User::findOrFail($id);
            $update->update($data);
            return redirect()->route('user.index');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = User::findOrFail($id);
            $data->delete();
            return redirect()->route('user.index');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
