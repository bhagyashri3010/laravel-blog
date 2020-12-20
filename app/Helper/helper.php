<?php
// use Image;
function saveImage($file,$path){
    // dd($path.'medium_img');
	$randonName = rand(1, 200);
	$extension = File::extension($file->getClientOriginalName());

	$img = Image::make($file->getRealPath());
	$filename = time().'_'.$randonName.'.'.$extension;

	// $path = public_path().'/events/'.'sparkicon';
	if(!File::isDirectory($path)){
		File::makeDirectory($path, 0777, true, true);
	}
    $img->save($path.$filename);
    if(!File::isDirectory($path.'medium_img')){
        File::makeDirectory($path.'medium_img', 0777, true, true);
      }
      $medium_img = Image::make($file)->resize(360,200);
      $medium_img->save($path.'medium_img/'.$filename);
    return($filename);
}

