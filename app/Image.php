<?php

namespace App;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Image as ImageIntervention;

class Image extends Model
{
    public function uploadFile($image){
        $fileName = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads/', $fileName);
        $this->name = $fileName;
        $this->save();

        return $this;
    }

    /*add watermark*/
    public function storeWatermarkImage($image) {
        $img = ImageIntervention::make($image);
        $watermark = ImageIntervention::make('images/watermark.png')
        ->resize($img->width() * 0.15);
        $img->insert($watermark, 'bottom-right', 20, 20);
        $img->save('uploads/watermark/' . $this->name);
    }

    /*add watermark text*/
    public function storeWatermarkTextImage($image){
        $img = ImageIntervention::make($image);
        $width = $img->width() * 0.7;
        $height = $img->height() * 0.9;

        $img->text('ARMADIO', $width, $height, function ($font) {
            $font->file('fonts/OpenSans-Bold.ttf');
            $font->size(38);
            $font->color('#ffffff');
            $font->align('left');
        });
        $img->save('uploads/watermark_text/' . $this->name);

    }

    /*Big image - 500x500*/
    public function storeBigImage($image) {
        ImageIntervention::make($image)
            ->resize(500, 500)
            ->save('uploads/big image/' . $this->name);
    }

    /*Small image - 100x100*/
    public function storeSmallImage($image) {
        ImageIntervention::make($image)
            ->resize(100,100)
            ->save('uploads/small image/' . $this->name);
    }

    public function getImage() {
        return 'uploads/' . $this->name;
    }

    public function getBigImage() {
        return 'uploads/big image/' . $this->name;
    }

    public function getSmallImage() {
        return 'uploads/small image/' . $this->name;
    }

    public function getWatermarkImage() {
        return 'uploads/watermark/' . $this->name;
    }

    public function hasName() {
        if($this->name && File::exists('uploads/' . $this->name)) {
           return true;
        }
        return false;
    }

}
