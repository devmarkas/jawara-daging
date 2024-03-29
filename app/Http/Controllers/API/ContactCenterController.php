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
        return response()
            ->json([
                'message' => 'Data Contact Center',
                'data'    => $data_contact_center,
            ], 200);

    }
}
