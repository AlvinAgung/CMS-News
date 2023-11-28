<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\News;
use App\Models\Video;
use App\Models\Villageofficer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = News::count();
        if($berita != null){
            $totalberita = $berita;
        }else{
            $totalberita = '0';
        }
        $acara = Acara::count();
        if($acara != null){
            $totalacara = $acara;
        }else{
            $totalacara = '0';
        }
        $video =  Video::count();
        if($video != null){
            $totalvideo = $video;
        }else{
            $totalvideo = '0';
        }
        $villageofficer =  Villageofficer::count();
        if($villageofficer != null){
            $totalvillageofficer = $villageofficer;
        }else{
            $totalvillageofficer = '0';
        }
        return view('pages.admin.dashboard',compact('totalberita','totalacara','totalvideo','totalvillageofficer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
