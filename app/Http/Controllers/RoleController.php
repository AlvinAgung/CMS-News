<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\News;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = Role::orderBy('created_at','desc')->get(); 
        return view('pages.admin.role.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleCreateRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
            ];
            $create = Role::create($data);
            return redirect()->route('role.index');
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
            $show = Role::findOrFail($id);
            return view('pages.admin.role.edit',compact('show'));
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
    public function update(RoleUpdateRequest $request, string $id)
    {
        try {
            $data = [
                'name' => $request->name,
            ];
            $update = Role::findOrFail($id);
            $update->update($data);
            return redirect()->route('role.index');
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
            $data = Role::findOrFail($id);
            $data->delete();
            return redirect()->route('role.index');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
