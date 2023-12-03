<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Category;
use App\Models\Counter;
use App\Models\News;
use App\Models\Video;
use App\Models\Villageofficer;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
  
        $tanggal = date('Y-m-d');
        $view = Counter::where('tanggal',$tanggal)->first();

        $count = Counter::create([
            'tanggal' => $tanggal,
            'counter' => '1'
        ]);

        $acara =  Acara::orderBy('created_at','desc')->get();
        $berita = News::with('category','user.villageofficer')->where('status','PUBLISHED')->orderBy('created_at','desc')->limit(3)->get();
        $video = Video::orderBy('created_at','desc')->get();
        $video_utama = Video::where('status','VIDEO UTAMA')->first();
        $perangkat_desa = Villageofficer::with('jabatan')->paginate(4);
        $counterkeseluruhan = Counter::count();
        $counterbulanini = Counter::whereMonth('tanggal', now()->month)->count();
        $counterhariini = Counter::whereDate('tanggal', today())->count();
        
        return view('pages.landing.index',compact('acara','berita','video','video_utama','perangkat_desa','counterkeseluruhan','counterbulanini','counterhariini'));
    }

    public function news()
    {   
        $berita = News::with('category','user')->where('status','PUBLISHED')->orderBy('created_at','desc')->paginate(9);
        return view('pages.landing.news',compact('berita'));
    }

    public function newsdetail($slug){
        $berita = News::with('category','user')->where('status','PUBLISHED')->where('slug',$slug)->first();
        $kategori = Category::withCount('news')->get();
        $beritaRecent = News::where('slug','!=',$berita->slug)->where('status','PUBLISHED')->orderBy('created_at','desc')->get();
        return view('pages.landing.detail-news',compact('berita','kategori','beritaRecent'));
    }

    public function video()
    {   
        $video = Video::orderBy('created_at','desc')->paginate(9);
        return view('pages.landing.video',compact('video'));
    }

    public function perangkat_desa()
    {   
        $perangkat_desa = Villageofficer::with('jabatan')->get();
        return view('pages.landing.perangkat-desa',compact('perangkat_desa'));
    }
}
