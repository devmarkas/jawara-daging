<?php

namespace App\Http\Controllers;

use App\Models\PopUpBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;


class PopUpBannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data_pop_up_banner = PopUpBanner::orderBy('id', 'DESC')->get();
        return view('pop-up-banner.index', ['data_pop_up_banner' => $data_pop_up_banner]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'link_image_pop_up_banner'  =>  'required|string',
                'key_type'    =>  'required|string',
                'value_type'  =>  'required|string',
                'image_pop_up_banner'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );



        if($request->file('image_pop_up_banner'))
            {
                $path = $request->file('image_pop_up_banner')->store('public/Image/Pop_Up_Banner_Image');
                $nameFile = 'storage/Image/Pop_Up_Banner_Image/'.$request->file('image_pop_up_banner')->hashName();
                $validator['image_pop_up_banner'] = $nameFile;
            }
        PopUpBanner::create($validator);
        return redirect()->route('pop-up-banner.index')->with('success','Pop Up Banner Created Successfully.');

    }

    public function update(Request $request, $id)
    {

        $validator = $request->validate([
            'link_image_pop_up_banner'  =>  'required|string',
            'key_type'    =>  'required|string',
            'value_type'  =>  'required|string',
            'image_pop_up_banner'       =>  '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pop_up_banner = PopUpBanner::find($id);
        if($request->file('image_pop_up_banner'))
            {
                $path = $request->file('image_pop_up_banner')->store('public/Image/Pop_Up_Banner_Image');
                $nameFile = 'storage/Image/Pop_Up_Banner_Image/'.$request->file('image_pop_up_banner')->hashName();
                $validator['image_pop_up_banner'] = $nameFile;
                if(File::exists(public_path($pop_up_banner->image_pop_up_banner))){
                    File::delete( $pop_up_banner->image_pop_up_banner);
                }
                $pop_up_banner->update(['image_pop_up_banner'=> $nameFile]);

            }

        $pop_up_banner->update([
            'link_image_pop_up_banner'=>$request->input('link_image_pop_up_banner'),
            'key_type' =>$request->input('key_type'),
            'value_type' =>$request->input('value_type')
        ]);
        return redirect()->route('pop-up-banner.index')->with('success','Pop Up Banner Update Successfully.');

    }


}
