<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
        return view("upload");
    }
    public function display()
    {
        // Return the display view
        $images = Upload::all(); // Retrieve all images from the database
        return view('display', ['images' => $images]);
    }
}
