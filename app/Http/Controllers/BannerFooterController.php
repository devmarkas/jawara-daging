<?php

namespace App\Http\Controllers;

use App\Models\BannerFooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class BannerFooterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_banner_footer = BannerFooter::orderBy('id', 'DESC')->get();
        return view('banner-footer.index', ['data_banner_footer' => $data_banner_footer]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'title_image_banner_footer'                 => 'required|string',
                'image_banner_footer'                       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'hide'                                      => 'required|string',
            ]
        );

        if($request->file('image_banner_footer'))
            {
                $path = $request->file('image_banner_footer')->store('public/Image/Image_Banner_Footer');
                $nameFile = 'storage/Image/Image_Banner_Footer/'.$request->file('image_banner_footer')->hashName();
                $validator['image_banner_footer'] = $nameFile;
            }
        BannerFooter::create($validator);
        return redirect()->route('footer-banner.index')->with('success','Banner Footer Created Successfully.');

    }

    public function update(Request $request, $id)
    {

        $validator = $request->validate(
            [
                'title_image_banner_footer'                 =>  'string',
                'image_banner_footer'                       =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'hide'                                      =>  'string',
            ]
        );

        $banner_footer = BannerFooter::find($id);
        if($request->file('image_banner_footer')) {
            $path = $request->file('image_banner_footer')->store('public/Image/Image_Banner_Footer');
            $nameFile = 'storage/Image/Image_Banner_Footer/'.$request->file('image_banner_footer')->hashName();
            $validator['image_banner_footer'] = $nameFile;
            if(File::exists(public_path($banner_footer->image_banner_footer))){
                File::delete( $banner_footer->image_banner_footer);
            }
            $banner_footer->update(['image_banner_footer'=> $nameFile]);
        }

        if($request->hide) {

            // dd($request->hide);

            if($request->hide == "true") {
                $hide = 'Banner Footer Berhasil Di Sembunyikan';
            } else {
                $hide = 'Banner Footer Berhasil Di Tamplikan';
            }
            $banner_footer->update(['hide' => $request->input('hide')]);
            return redirect()->route('footer-banner.index')->with('success', $hide);

        }


        $banner_footer->update(
            ['title_image_banner_footer'=>$request->input('title_image_banner_footer')]
        );
        return redirect()->route('footer-banner.index')->with('success','Banner Footer Update Successfully.');

    }
}
