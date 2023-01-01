<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ContactCenter;
use Illuminate\Http\Request;

class ContactCenterController extends Controller
{
    public function index()
    {

        $data_contact_center = ContactCenter::orderBy('id', 'DESC')->get();
        dd($data_contact_center);
        if (condition) {
            # code...
        }
        return response()
            ->json([
                'message' => 'Data Banner',
                'data'    => $data_contact_center,
            ], 200);

    }
}
