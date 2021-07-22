<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\News;
use App\Models\Galeri;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function home()
    {
        $datapost = Post::all();
        $datanws = News::all();
        return view('beranda', ['posts' => $datapost, 'news' => $datanws]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function news()
    {
        $datanws = News::all();
        return view('news_event', ['news' => $datanws]);
    }
    public function galeris()
    {
        $datagaleri = Galeri::all();
        return view('galeri', ['galeris' => $datagaleri]);
    }
    public function aboutus()
    {
        return view('about');
    }
}
