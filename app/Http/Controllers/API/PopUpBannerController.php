<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PopUpBanner;
use Illuminate\Http\Request;

class PopUpBannerController extends Controller
{
    public function index()
    {

        $data_pup_up_banner = PopUpBanner::all();
        return response()
            ->json([
                'message' => 'Data Banner',
                'data'    => $data_pup_up_banner,
            ], 200);
        
    }
}