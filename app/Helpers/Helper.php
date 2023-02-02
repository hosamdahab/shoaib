<?php
use File as FileManger;

function UploadFile($file)
{
    $file_name=time().$file->getClientOriginalName();
    $file->move('public/uploads/images',$file_name);
    return 'public/uploads/images/'. $file_name;
     
}


function DeleteFile($file)
{
    FileManger::delete($file);
}