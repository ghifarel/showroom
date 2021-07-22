<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Halaman utama news
        $user = Auth::user();
        if ($user->hasRole('petugas') or $user->hasRole('admin')) {
            // dapat mengakses data news
            $datanws = News::latest()->paginate(10);
            return view('news_index', ['news' => $datanws]);
        } else {
            // dialihkan ke halaman beranda
            $datanws = News::latest()->paginate(10);
            return view('beranda', ['news' => $datanws]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'content'   => 'required'
        ]);

        //upload image
    $image = $request->file('image');
    $image->storeAs('public/news', $image->hashName());

    $news = News::create([
        'image'     => $image->hashName(),
        'title'     => $request->title,
        'content'   => $request->content
    ]);

    if($news){
        //redirect dengan pesan sukses
        return redirect()->route('news.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('news.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nws = News::where('id',$id)->first();
        return view('news_show',['news' => $nws]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $nws)
    {
        return view('news_edit', compact('nws'));
    }
    public function update(Request $request, News $nws)
    {
        $this->validate($request, [
            'title'     => 'required',
            'content'   => 'required'
        ]);
    
        //get data News by ID
        $nws = News::findOrFail($nws->id);
    
        if($request->file('image') == "") {
    
            $nws->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
    
        } else {
    
            //hapus old image
            Storage::disk('local')->delete('public/news/'.$nws->image);
    
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/news', $image->hashName());
    
            $nws->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);
    
        }
    
        if($post){
            //redirect dengan pesan sukses
            return redirect()->route('news.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('news.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    public function destroy($id)
    {
    $nws = News::find($id);
    Storage::disk('local')->delete('public/news/'.$nws->image);
    $nws->delete();

  if($nws){
     //redirect dengan pesan sukses
     return redirect()->route('news.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('news.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
}