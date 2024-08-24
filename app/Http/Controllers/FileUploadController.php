<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\DB;
// use Post;
// use session;

class FileUploadController extends Controller
{
    public function Uploads(Request $request){
        $request->validate([
            'name' =>'required|max:255',
            'email'=> 'required',
            'image' =>'nullable|mimes:png,jpg,jpeg,webp',
        ]);
        if($request->has('image')){
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();

        $filename = time().'.'.$extention;
        $file->move('app/public/uploads', $filename);

        Upload::create([
            'name'=> $request->name,
            'email' => $request->email,
            'image'=>$filename,
        ]);

        return redirect()->back()->with('success','Image has been Uploaded Successfully');
        }
         else {
            return redirect()->back()->with('error','Please select an image to upload');
        }
        
        //Post::create($request->all());
        //return back()->with('message','the Data has been uploaded');
        //$request->session()->flash('success', 'Post created successfully.');
        //Session::flash('alert-class', 'alert-success'); 
    }
    public function edit($id)
    {
        $image = Upload::findOrFail($id);
        return view('edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = Upload::findOrFail($id);
        $image->name = $request->name;
        $image->email = $request->email;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('uploads'), $imageName);
            $image->image = $imageName;
        }

        $image->save();

        return redirect()->route('display')->with('success', 'Data updated successfully');
    }
    public function destroy($id)
    {
        $image = Upload::findOrFail($id);

        // Delete image file
        Storage::delete('app/public/uploads/' . $image->image);

        $image->delete();

        return redirect()->route('display')->with('success', 'Image deleted successfully!');
    }
}
