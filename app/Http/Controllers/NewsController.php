<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $berita =  News::with(['category' => function($query){
            $query->select('id','name');
        }])->orderby('created_at','desc')->get();
        return view('pages.admin.berita.index',compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Category::all(); 
        return view('pages.admin.berita.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsCreateRequest $request)
    {
        try {
            if ($request->file('picture')) {
                $picture = $request->file('picture');
                $extpicture = $picture->getClientOriginalExtension();
                $newpicture = Str::slug($request->title) . '-' . date("Ymd_His") . "." . $extpicture;
                $picture->storeAs('public/picture/news', $newpicture);
                $picturePath = $newpicture;
            } else {
                $picturePath = null;
            }
                $data = [
                    'title' => $request->title,
                    'slug' => Str::slug($request->title).'-'.time(),
                    'user_id' => Auth::user()->id,
                    'category_id' => $request->category_id,
                    'content' => $request->content,
                    'picture' => $picturePath,
                    'status' => $request->status,
                ];
                $create = News::create($data);
                return redirect()->route('berita.index');
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
            $kategori = Category::get();
            $show = News::findOrFail($id);
            return view('pages.admin.berita.edit',compact(['show','kategori']));
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
    public function update(NewsUpdateRequest $request, string $id)
    {
        try {
        
            $update = News::findOrFail($id);
        
            if ($request->Hasfile('picture') == null) {
                $picturePath = $request->picture2;
    
              }else{
                $picture = $request->file('picture');
                $extpicture = $picture->getClientOriginalExtension();
                $newpicture = Str::slug($request->title) . '-' . date("Ymd_His") . "." . $extpicture;
                $picture->storeAs('public/picture/news', $newpicture);
                $picturePath = $newpicture;
    
                $image_path = $update->picture;
                File::delete(storage_path('app/public/picture/news/'.$image_path));
              }
     
            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title).'-'.time(),
                'category_id' => $request->category_id,
                'content' => $request->content,
                'picture' => $picturePath,
                'status' => $request->status,
            ];
          
            $update->update($data);
            return redirect()->route('berita.index')->with('notify', 'Berita berhasil diupdate !');

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
            $data = News::findOrFail($id);
            $image_path = $data->picture;
            File::delete(storage_path('app/public/picture/news/'.$image_path));
            $data->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
