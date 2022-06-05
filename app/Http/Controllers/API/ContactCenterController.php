<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ContactCenter;
use Illuminate\Http\Request;

class ContactCenterController extends Controller
{
    public function index()
    {

        $data_contact_center = ContactCenter::all();
        return response()
            ->json([
                'message' => 'Data Banner',
                'data'    => $data_contact_center,
            ], 200);
        
    }
}
