<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoCreateRequest;
use App\Http\Requests\VideoUpdateRequest;
use App\Models\Role;
use App\Models\Video;
use App\Models\Villageofficer;
use Illuminate\Http\Request;

class VideoController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $video = Video::orderBy('created_at','desc')->get(); 
        return view('pages.admin.video.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('pages.admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoCreateRequest $request)
    {
        try {
            $data = [
                'title' => $request->title,
                'video_url' => $request->video_url,
                'status' => 'VIDEO',
            ];
            $create = Video::create($data);
            return redirect()->route('video.index');
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
            $show = Video::findOrFail($id);
            return view('pages.admin.video.edit',compact('show'));
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
    public function update(VideoUpdateRequest $request, string $id)
    {
        try {

            if($request->status == 'VIDEO UTAMA'){
                $update1 = Video::where('status','VIDEO UTAMA')->update(['status'=>'VIDEO']);

                $data = [
                    'title' => $request->title,
                    'video_url' => $request->video_url,
                    'status' => $request->status,
                ];
              
                $update = Video::findOrFail($id);
                $update->update($data);
            }

            return redirect()->route('video.index');
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
            $data = Video::findOrFail($id);
            if($data->status == "VIDEO UTAMA"){
                return redirect()->route('video.index')->with('Video ini masih menjadi video utama');
            }else{
                $data->delete();
                return redirect()->route('video.index');
            }

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
