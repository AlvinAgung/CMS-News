<?php

namespace App\Http\Controllers;

use App\Http\Requests\JabatanCreateRequest;
use App\Http\Requests\JabatanUpdateRequest;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Jabatan;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jabatan = Jabatan::orderBy('created_at','desc')->get(); 
        return view('pages.admin.jabatan.index',compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JabatanCreateRequest $request)
    {
        $slug = Str::slug($request->name);
        try {
            $slug = Str::slug($request->name);
            $data = [
                'name' => $request->name,
                'slug' => $slug,
            ];
            $create = Jabatan::create($data);
            return redirect()->route('jabatan.index');
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
            $show = Jabatan::findOrFail($id);
            return view('pages.admin.jabatan.edit',compact('show'));
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
    public function update(JabatanUpdateRequest $request, string $id)
    {
        try {
            $slug = Str::slug($request->name);
            $data = [
                'name' => $request->name,
                'slug' => $slug,
            ];
            $update = Jabatan::findOrFail($id);
            $update->update($data);
            return redirect()->route('jabatan.index');
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
            $data = Jabatan::findOrFail($id);
            $data->delete();
            return redirect()->route('jabatan.index');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
