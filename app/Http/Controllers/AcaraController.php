<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcaraCreateRequest;
use App\Http\Requests\AcaraUpdateRequest;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Acara;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $acara = Acara::orderBy('created_at','desc')->get(); 
        return view('pages.admin.acara.index',compact('acara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.acara.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AcaraCreateRequest $request)
    {
        try {
            $data = [
                'title' => $request->title,
                'time' => $request->time,
                'content' => $request->content,
            ];
            $create = Acara::create($data);
            return redirect()->route('acara.index');
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
            $show = Acara::findOrFail($id);
            return view('pages.admin.acara.edit',compact('show'));
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
    public function update(AcaraUpdateRequest $request, string $id)
    {
        try {
            $data = [
                'title' => $request->title,
                'time' => $request->time,
                'content' => $request->content,
            ];
            $update = Acara::findOrFail($id);
            $update->update($data);
            return redirect()->route('acara.index');
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
            $data = Acara::findOrFail($id);
            $data->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
