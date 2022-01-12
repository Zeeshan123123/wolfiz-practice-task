<?php

function uploadImage($image,$loaded_image = '')
{

    if((isset($image) && trim(strlen($image)) > 0))
    {
        $image =  imageLinker($image);
    }
    else
    {
        if(strlen(trim($loaded_image)) > 0)
        {
            $image =  $loaded_image;
        }
        else
        {
           $image = '';
        }
    }

    return $image;
}

function imageLinker($contant_file)
{
    $file_name = uniqid().'.'.$contant_file->getClientOriginalExtension();

    \Storage::disk('public')->put('images/'.$file_name,file_get_contents($contant_file));

    return $file_name;
}

function getImage($file_name)
{
    return asset(Storage::url('images/'.$file_name));
}