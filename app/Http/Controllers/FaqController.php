<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Intervention\Image\Facades\Image as ImageFaq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_faq = Faq::orderBy('id', 'DESC')->get();
        return view('faq.index', ['data_faq' => $data_faq]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title_faq' => 'required',
            'rich_text_faq' => 'required'
        ]);

        $storage = "storage/Image/Term_Condition/";
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($request->rich_text_faq,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach($images as $image_rich_text){
            $src = $image_rich_text->getAttribute('src');
            if(preg_match('/data:image/',$src)){
                preg_match('/data:image\/(?<mime>.*?)\;/',$src,$groups);
                $mimetype = $groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent),6,6).'-'.time();
                $filepath = ("$storage/$fileNameContentRand.$mimetype");
                $image = ImageFaq::make($src)
                    ->encode($mimetype,100)
                    ->save(public_path($filepath));
                $new_src=asset($filepath);
                $image_rich_text->removeAttribute('src');
                $image_rich_text->setAttribute('src',$new_src);
                $image_rich_text->setAttribute('class', 'img-responsive');
            }
        }

        $data_faq=Faq::create([
            'title_faq'     =>  $request->title_faq,
            'rich_text_faq' =>  $dom->saveHTML(),
        ]);

        return redirect()->route('faq.index')->with('success','Faq Create Successfully.');

    }

    public function edit($id)
    {
        $data_faq = Faq::find($id);
        return view('faq.edit', ['data_faq' => $data_faq]);
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title_faq' => 'required',
            'rich_text_faq' => 'required'
        ]);

        $data_faq = Faq::find($id);

        $storage = "storage/Image/Term_Condition/";
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($request->rich_text_faq,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach($images as $image_rich_text){
            $src = $image_rich_text->getAttribute('src');
            if(preg_match('/data:image/',$src)){
                preg_match('/data:image\/(?<mime>.*?)\;/',$src,$groups);
                $mimetype = $groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent),6,6).'-'.time();
                $filepath = ("$storage/$fileNameContentRand.$mimetype");
                $image = ImageFaq::make($src)
                    ->encode($mimetype,100)
                    ->save(public_path($filepath));
                $new_src=asset($filepath);
                $image_rich_text->removeAttribute('src');
                $image_rich_text->setAttribute('src',$new_src);
                $image_rich_text->setAttribute('class', 'img-responsive');
            }
        }

        $data_faq->update([
            'title_faq'     =>  $request->title_faq,
            'rich_text_faq' =>  $dom->saveHTML(),
        ]);

        return redirect()->route('faq.edit',$id)->with('success','FAQ Update Successfully.');

    }



    public function destroy($id)
    {
        $banner = Faq::find($id);
        $banner->delete();

        return redirect()->route('faq.index')
                        ->with('success','FAQ Delete Successfully.');
    }
}
