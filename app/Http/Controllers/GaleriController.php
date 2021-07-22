<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Halaman utama galeri
        $user = Auth::user();
        if ($user->hasRole('petugas') or $user->hasRole('admin')) {
            // dapat mengakses data galeri
            $datagaleri = Galeri::latest()->paginate(10);
            return view('galeri_index', ['galeris' => $datagaleri]);
        } else {
            // dialihkan ke halaman beranda
            $datagaleri = Galeri::latest()->paginate(10);
            return view('beranda', ['galeris' => $datagaleri]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galeri_create');
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
    $image->storeAs('public/galeris', $image->hashName());

    $galeri = Galeri::create([
        'image'     => $image->hashName(),
        'title'     => $request->title,
        'content'   => $request->content
    ]);

    if($galeri){
        //redirect dengan pesan sukses
        return redirect()->route('galeris.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('galeris.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $galeri = Galeri::where('id',$id)->first();
        return view('galeri_show',['galeris' => $galeri]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        return view('galeri_edit', compact('galeri'));
    }
    public function update(Request $request, Galeri $galeri)
    {
        $this->validate($request, [
            'title'     => 'required',
            'content'   => 'required'
        ]);
    
        //get data Galeri by ID
        $galeri = Galeri::findOrFail($galeri->id);
    
        if($request->file('image') == "") {
    
            $galeri->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
    
        } else {
    
            //hapus old image
            Storage::disk('local')->delete('public/galeris/'.$galeri->image);
    
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/galeris', $image->hashName());
    
            $galeri->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);
    
        }
    
        if($galeri){
            //redirect dengan pesan sukses
            return redirect()->route('galeris.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('galeris.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    public function destroy($id)
    {
    $galeri = Galeri::find($id);
    Storage::disk('local')->delete('public/galeris/'.$galeri->image);
    $galeri->delete();

  if($galeri){
     //redirect dengan pesan sukses
     return redirect()->route('galeris.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('galeris.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
}