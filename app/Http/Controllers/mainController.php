<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Image;
use App\Screenshot;

class mainController extends Controller
{
	protected $request;
	public function __construct(Request $request){
		$this->request = $request;
	}
    public function getScreenshot(){
    	return view('web.screenshot');
    }
    public function postsaveImage(){
    	$filename;
    	$currentImg = $this->request->input('imageurl');
    	if($this->request->has('image_name')){
    		$filename = $this->request->input('image_name').'.png';
    	}
    	else{
    		$filename = date("Y-m-d H:i:s").'.png';
    	}
    	$img1 = str_replace('data:image/png;base64,', '', $currentImg);
        $path = public_path().'/screenshots/'.$filename;
    	$img = Image::make($img1)->resize(600, null, function($constraint){
    		$constraint->aspectRatio();
    	});
    	$img->save($path);
    	$imagetosave = new Screenshot;
    	$imagetosave->name = $filename;
    	$imagetosave->image_path = $path;
    	$imagetosave->save();
    	return "url path".$filename;
    }
    
}
