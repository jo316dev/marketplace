<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function removePhoto($photoId)
    {
       
        $photo = ProductPhotos::find($photoId); // search imagem on data;

        $photoRemove = substr($photo->image, 9); //with help substr, remove "product\" from name

        // dd($photo->image);

        // dd($photoRemove);

        if(Storage::disk('public')->exists($photoRemove)){ 

            Storage::disk('public')->delete($photoRemove);

        }

        
        $photo->delete();

        return redirect()->back()->with('success', 'Foto removida com sucesso!');

    }
}
