<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PopUpBanner;
use Illuminate\Http\Request;

class PopUpBannerController extends Controller
{
    public function index()
    {

        $data_pup_up_banner = PopUpBanner::orderBy('id', 'DESC')->get();
        return response()
            ->json([
                'message' => 'Data Pop Up Banner',
                'data'    => $data_pup_up_banner,
            ], 200);

    }
}
