<?php

namespace App\Model\Web;

use Illuminate\Database\Eloquent\Model;
use Image;
use File;

class Common extends Model
{
    public function getList($modelIstance,$listkey,$listValue){

        $list = [];

        if(!is_null($modelIstance)){

            foreach ($modelIstance as $key => $value) {
                if(isset($value)){
                    $list[$value->$listkey] = $value->$listValue;
                }
            }
        }

        return $list;
    }



    public function uploadImage($name,$imagefile,$path){

        $image = $imagefile;

        $imageName = strtolower($name).".".$image->getClientOriginalExtension();

        $saveImage = null;

        $existsFile = public_path($path . $imageName );

        if(file_exists($existsFile)){
            $deleteFile = File::delete($existsFile);
            if($deleteFile){
                $saveImage = Image::make($image)->resize(380, 340)->save( public_path($path . $imageName ) );
            }else{
                dd('Unable to delete file');
            }
        }else{
            $saveImage = Image::make($image)->save( public_path($path . $imageName ) );
        }

        if($saveImage){
            return true;
        }else{
            return false;
        }
    }

    public function updateImage($name,$imagefile,$path){

        $imageName = strtolower($name).".".$imagefile->getClientOriginalExtension();
        $existsFile = public_path($path . $imageName );

        if(file_exists($existsFile)){
            File::delete($existsFile);
        }
        $saveImage = Image::make($imagefile)->resize(380, 340)->save( public_path($path . $imageName ) );

        return $saveImage;
    }

    public function deleteImage($imageName,$path){

        $existsFile = public_path($path . $imageName );

        $deleteFile = false;

        if(file_exists($existsFile)){
            $deleteFile = File::delete($existsFile);
            if($deleteFile){
                return true;
            }
        }
        return $deleteFile;
    }
}
