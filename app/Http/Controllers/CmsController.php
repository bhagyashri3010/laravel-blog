<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cms;

class CmsController extends Controller
{
    public function about_us()
    {
        $about = Cms::where('cms_type','about_us')->first();
        return view('cms.about_us',['about' => $about]);
    }
    public function addaboutus(Request $request)
    {
        $check = Cms::where('cms_type','about_us')->first();
        if(isset($check->content)){
            $check->content = $request->description;
            $check->update();
        }
        else{
            $data= [];
            $data['cms_type']='about_us';
            $data['content']=$request->description;
            Cms::create($data);
        }
        return redirect('about_us');
    }
}
