<?php

namespace App\Http\Controllers;

use App\Models\ContactCenter;
use Illuminate\Http\Request;

class ContactCenterController extends Controller
{
    public function index()
    {
        $data_contact_center = ContactCenter::all();
        return view('contact-center.index', ['data_contact_center' => $data_contact_center]);      
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'alamat_kantor'         => 'required',
                'no_tlp'                => 'required',
                'alamat_email'          => 'required',
                'alamat_website'        => 'required',
            ]
        );

     
        ContactCenter::create($validator);
        return redirect()->route('contact-center.index')
                     ->with('success','Contact Center Publish Successfully.');
        
    }

    public function update(Request $request, $id)
    {

        $validator = $request->validate([
            'alamat_kantor'         => 'required',
            'no_tlp'                => 'required',
            'alamat_email'          => 'required',
            'alamat_website'        => 'required',
        ]);

        $banner = ContactCenter::find($id);
        $banner->update($validator);
    
        return redirect()->route('contact-center.index')->with('success','Contact Center Publish Successfully.');
                        
    }

}
