<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    protected  $data =[];

    public function saveImage($folder,$file,$oldfile='')
    {
        $deleteFile = public_path().'/images/'.'/'.$folder.'/'.$oldfile;

        if(\File::exists($deleteFile)){
            \File::delete($deleteFile);
        }

        $name =time().$file->getClientOriginalName();
        $file->move(public_path().'/images/'.'/'.$folder.'/',$name);
        return $name;


    }

    public function updateImage($folder,$file,$oldfile)
    {
        $this->deleteImage($folder,$oldfile);
        $name =time().$file->getClientOriginalName();
        $file->move(public_path().'/images/'.'/'.$folder.'/',$name);
        return $name;


    }



    public function deleteImage($folder,$file)
    {
        $deleteFile = public_path().'/images/'.'/'.$folder.'/'.$file;

        if(\File::exists($deleteFile)){
            \File::delete($deleteFile);
        }
    }
}
