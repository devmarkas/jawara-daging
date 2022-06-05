<?php

namespace App\Http\Controllers;

use App\Models\TermCondition;
// use Path\To\DOMDocument;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    public function index()
    {
        
        $data_term_condition = TermCondition::all();
        return view('term-condition.index', ['data_term_condition' => $data_term_condition]);    
        
    }

    public function store(Request $request)
    {
 
        $this->validate($request, [
            'rich_text' => 'required'
        ]);

        $storage = "storage/Image/Term_Condition/";
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($request->rich_text,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
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
                $image = Image::make($src)
                    ->encode($mimetype,100)
                    ->save(public_path($filepath));
                $new_src=asset($filepath);
                $image_rich_text->removeAttribute('src');
                $image_rich_text->setAttribute('src',$new_src);
                $image_rich_text->setAttribute('class', 'img-responsive');
            }
        }

        $data_term_condition=TermCondition::create([
            'rich_text' =>  $dom->saveHTML(),
        ]);
        
        dd($data_term_condition->toArray());

    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'rich_text' => 'required',
        ]);

        $data_term_condition = TermCondition::find($id);

        $storage = "storage/Image/Term_Condition/";
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($request->rich_text,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
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
                $image = Image::make($src)
                    ->encode($mimetype,100)
                    ->save(public_path($filepath));
                $new_src=asset($filepath);
                $image_rich_text->removeAttribute('src');
                $image_rich_text->setAttribute('src',$new_src);
                $image_rich_text->setAttribute('class', 'img-responsive');
            }
        }

        $data_term_condition->update([
            'rich_text' =>  $dom->saveHTML(),
        ]);
        
        return redirect()->route('term-condition.index')->with('success','Term & Condition Publish Successfully.');
                        
    }
}


