<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\photo;

class photosController extends Controller
{
    public function create($album_id){
        return view('photos.create')->with('album_id',$album_id);
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'photo'=>'image|nullable|max:1999'
        ]);

        $filenameWithExt =  $request->file('photo')->getClientOriginalName();
        
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
        $extension =  $request->file('photo')->getClientOriginalExtension();
        
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenameToStore);
        
        //upload photo
        $photo = new photo;

        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;

        $photo->save();

        return redirect('/album/'.$request->input('album_id'))->with('success', 'photo uploaded');
    }

    public function destroy($id){
        $photo = photo::find($id); 
        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete(); 
            return redirect('/album/'.$photo->album_id)->with('error', 'Photo has been deleted successfully');
        }
        
    }
}
