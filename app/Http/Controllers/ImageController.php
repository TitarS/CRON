<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Image as ImageIntervention;

class ImageController extends Controller
{

    public function index() {
        $images = Image::all();
        return view('listImages', compact('images'));
    }

    public function add(){
        return view('addImage');
    }

    public function store(Request $request) {
        $image = new Image;
        $image->uploadFile($request->file('name'));
        $image->storeWatermarkImage($request->file('name'));
        $image->storeBigImage($request->file('name'));
        $image->storeSmallImage($request->file('name'));
        $image->storeWatermarkTextImage($request->file('name'));

        return redirect()->back();
    }

    public function show($name, $width, $height) {
        $image = ImageIntervention::make(public_path('uploads/' . $name))
            ->fit($width, $height);

        return $image->response();
    }
}
