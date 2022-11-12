<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data_banner = Banner::all();
        return view('banner.index', ['data_banner' => $data_banner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'title'         => 'required|string',
                'value_type' => 'required|string',
                'key_type' => 'required|string',
                'image_banner'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        if($request->file('image_banner'))
            {
                $path = $request->file('image_banner')->store('public/Image/Banner_Image');
                $nameFile = 'storage/Image/Banner_Image/'.$request->file('image_banner')->hashName();
                $validator['image_banner'] = $nameFile;
            }
        Banner::create($validator);
        return redirect()->route('banner.index')
                     ->with('success','Banner ' . $request->title . ' Created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    // public function show(Banner $banner)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    // public function edit(Banner $banner)
    // {
    //     return view('banner.edit',compact('banner'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = $request->validate([
            'title'         => 'nullable|string',
            'value_type' => 'required|string',
            'key_type' => 'required|string',
            'image_banner'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $banner = Banner::find($id);
        if($request->file('image_banner'))
            {
                $path = $request->file('image_banner')->store('public/Image/Banner_Image');
                $nameFile = 'storage/Image/Banner_Image/'.$request->file('image_banner')->hashName();
                $validator['image_banner'] = $nameFile;

                if(File::exists(public_path($banner->image_banner))){
                    File::delete($banner->image_banner);
                }
            }
        $banner->update($validator);

        return redirect()->route('banner.index')->with('success','Banner ' . $request->title . ' Update Successfully.');

    }


    public function destroy($id)
    {
        $banner = Banner::find($id);
        if(File::exists(public_path($banner->image_banner))){
            File::delete($banner->image_banner);
        }
        $banner->delete();

        return redirect()->route('banner.index')
                        ->with('success','Banner ' . $banner->title . ' Delete Successfully.');
    }
}
