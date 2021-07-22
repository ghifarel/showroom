<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Halaman utama post
        $user = Auth::user();
        if ($user->hasRole('petugas') or $user->hasRole('admin')) {
            // dapat mengakses data post
            $datapost = Post::latest()->paginate(10);
            return view('post_index', ['posts' => $datapost]);
        } else {
            // dialihkan ke halaman beranda
            $datapost = Post::latest()->paginate(10);
            return view('beranda', ['posts' => $datapost]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post_create');
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
    $image->storeAs('public/posts', $image->hashName());

    $post = Post::create([
        'image'     => $image->hashName(),
        'title'     => $request->title,
        'content'   => $request->content
    ]);

    if($post){
        //redirect dengan pesan sukses
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('posts.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $post = Post::where('id',$id)->first();
        return view('post_show',['posts' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post_edit', compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title'     => 'required',
            'content'   => 'required'
        ]);
    
        //get data Post by ID
        $post = Post::findOrFail($post->id);
    
        if($request->file('image') == "") {
    
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
    
        } else {
    
            //hapus old image
            Storage::disk('local')->delete('public/posts/'.$post->image);
    
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());
    
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);
    
        }
    
        if($post){
            //redirect dengan pesan sukses
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('posts.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    public function destroy($id)
    {
    $post = Post::find($id);
    Storage::disk('local')->delete('public/posts/'.$post->image);
    $post->delete();

  if($post){
     //redirect dengan pesan sukses
     return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('posts.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
}