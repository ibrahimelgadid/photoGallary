<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\album;

class albumsController extends Controller
{
    public function index(){
        $albums = album::with('photos')->get();
        return view('albums.index')->with('albums',$albums);
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);

        $filenameWithExt =  $request->file('cover_image')->getClientOriginalName();
        
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
        $extension =  $request->file('cover_image')->getClientOriginalExtension();
        
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);
        
        //create new album
        $Album = new album;

        $Album->name = $request->input('name');
        $Album->description = $request->input('description');
        $Album->cover_image = $filenameToStore;

        $Album->save();

        return redirect('/album')->with('success', 'New album added');
    }

    public function show($id){
        $album = album::with('photos')->find($id);
        return view('albums.show')->with('album',$album);
    }
}
