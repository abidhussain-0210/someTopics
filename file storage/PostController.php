<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Http\Controllers\API\BaseController as BaseController;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    
    public function fileStorage(Request $request){
        
        $file = $request->file('image');
        $name = 'xyz.'.$file->extension();

        //Storefile
        return Storage::putFileAs('xyz-file' , $file , $name);

        //copyFile
        Storage::copy('xyz-file/xyz.jpg' , 'public/xyz.jpg');

        //cutFile
        Storage::move('xyz-file/xyz.jpg' , 'public/xyz.jpg');

        //listFile
        $data = Storage::files('public');
        dd($data);

        //downloadFile
        return Storage::download('xyz-file/xyz.jpg');

        //deleteFile
        if(Storage::exists('xyz-file/xyz.jpg'))
        {
             return Storage::delete('xyz-file/xyz.jpg');
        }
        else{
            return "No File";
        }

        //DeleteFolder
        //return Storage::deleteDirectory('xyz-file');
    }


    
}
