<?php
namespace App\Traits;
use http\Env\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

trait StorageImageTrait
{
public  function storageTraitUpload($request,$fieldName,$folderName){
    if($request->hasFile($fieldName)){
        $file=$request[$fieldName];
        $filenameOrigin=$request[$fieldName]->getClientOriginalName();
        $fileNameHash=Str::random(20).'.'.$file->getClientOriginalExtension();
        $filepath = $request->file($fieldName)->storeAs('public/'.$folderName.'/'.auth()->id(),$fileNameHash);
        $dataUploadFile=[
            'file_name'=>$filenameOrigin,
            'file_path'=>Storage::url($filepath)
        ];
        return $dataUploadFile;

    }
return null;
}
public  function storageTraitUploadMultiple($file,$folderName){

        $filenameOrigin=$file->getClientOriginalName();
        $fileNameHash=Str::random(20).'.'.$file->getClientOriginalExtension();
        $filepath = $file->storeAs('public/'.$folderName.'/'.auth()->id(),$fileNameHash);
        $dataUploadFile=[
            'file_name'=>$filenameOrigin,
            'file_path'=>Storage::url($filepath)
        ];
        return $dataUploadFile;
}
public  function storageTraitDelete($filePath){
    $normalizedPath = ltrim($filePath, '/');
    if (substr($normalizedPath, 0, 8) === 'storage/') {
        $normalizedPath = substr($normalizedPath, 8);
    }
    if (Storage::disk('public')->exists($normalizedPath)) {
        Storage::disk('public')->delete($normalizedPath);
    }
    
}
}

