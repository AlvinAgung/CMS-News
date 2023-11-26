<?php

namespace App\Http\Controllers;

use App\Http\Requests\VillageOfficerCreateRequest;
use App\Http\Requests\VillageOfficerUpdateRequest;
use App\Models\Jabatan;
use App\Models\Villageofficer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class VillageOfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perangkatdesa =  Villageofficer::with(['jabatan' => function($query){
            $query->select('id','name');
        }])->orderby('created_at','desc')->get();
       
        return view('pages.admin.perangkat-desa.index',compact('perangkatdesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatan = Jabatan::all(); 
        return view('pages.admin.perangkat-desa.create',compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VillageOfficerCreateRequest $request)
    {
        try {
            if ($request->file('picture')) {
                $picture = $request->file('picture');
                $extpicture = $picture->getClientOriginalExtension();
                $newpicture = Str::slug($request->name) . '-' . date("Ymd_His") . "." . $extpicture;
                $picture->storeAs('public/picture/perangkat-desa', $newpicture);
                $picturePath = $newpicture;
            } else {
                $picturePath = null;
            }
                $data = [
                    'nip' => $request->nip,
                    'name' => $request->name,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'telp' => $request->telp,
                    'jabatan_id' => $request->jabatan_id,
                    'photo' => $picturePath,
                ];
                $create = Villageofficer::create($data);
                return redirect()->route('perangkat-desa.index');
        } catch (\Throwable $th) {
            $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $jabatan = Jabatan::get();
            $show = Villageofficer::findOrFail($id);
            return view('pages.admin.perangkat-desa.edit',compact(['show','jabatan']));
        } catch (\Exception $e) {
           return $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VillageOfficerUpdateRequest $request, string $id)
    {
        try {
        
            $update = Villageofficer::findOrFail($id);
        
            if ($request->Hasfile('picture') == null) {
                $picturePath = $request->picture2;
    
              }else{
                $picture = $request->file('picture');
                $extpicture = $picture->getClientOriginalExtension();
                $newpicture = Str::slug($request->name) . '-' . date("Ymd_His") . "." . $extpicture;
                $picture->storeAs('public/picture/perangkat-desa', $newpicture);
                $picturePath = $newpicture;
    
                $image_path = $update->photo;
                File::delete(storage_path('app/public/picture/perangkat-desa/'.$image_path));
              }
     
            $data = [
                'nip' => $request->nip,
                'name' => $request->name,
                'address' => $request->address,
                'gender' => $request->gender,
                'email' => $request->email,
                'telp' => $request->telp,
                'jabatan_id' => $request->jabatan_id,
                'photo' => $picturePath,
            ];
          
            $update->update($data);
            return redirect()->route('perangkat-desa.index')->with('notify', 'perangkat-desa berhasil diupdate !');

        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Villageofficer::findOrFail($id);
            $image_path = $data->photo;
            File::delete(storage_path('app/public/picture/perangkat-desa/'.$image_path));
            $data->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
