<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategori = Category::orderBy('created_at','desc')->get(); 
        return view('pages.admin.kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        $slug = Str::slug($request->name);
        try {
            $slug = Str::slug($request->name);
            $data = [
                'name' => $request->name,
                'slug' => $slug,
            ];
            $create = Category::create($data);
            return redirect()->route('kategori-berita.index');
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
            $show = Category::findOrFail($id);
            return view('pages.admin.kategori.edit',compact('show'));
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
    public function update(CategoryUpdateRequest $request, string $id)
    {
        try {
            $slug = Str::slug($request->name);
            $data = [
                'name' => $request->name,
                'slug' => $slug,
            ];
            $update = Category::findOrFail($id);
            $update->update($data);
            return redirect()->route('kategori-berita.index');
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
            $data = Category::findOrFail($id);
            $data->delete();
            return redirect()->route('kategori-berita.index');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
