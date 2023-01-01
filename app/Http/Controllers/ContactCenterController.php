<?php

namespace App\Http\Controllers;

use App\Models\ContactCenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactCenterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_contact_center = ContactCenter::orderBy('id', 'DESC')->get();
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
            "chk_link_wa"           => "string",
            "link_wa"               => "string"
        ]);

        if ($request->chk_link_wa == null) {
            $banner = ContactCenter::find($id);
            $banner->update([
                'alamat_kantor'         => $request->alamat_kantor,
                'no_tlp'                => $request->no_tlp,
                'alamat_email'          => $request->alamat_email,
                'alamat_website'        => $request->alamat_email,
                "chk_link_wa"           => "Not Active",
                "link_wa"               => $request->link_wa
            ]);
        }

        $banner = ContactCenter::find($id);
        $banner->update($validator);

        return redirect()->route('contact-center.index')->with('success','Contact Center Publish Successfully.');

    }

}
