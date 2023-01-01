<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BannerFooter;
use Illuminate\Http\Request;

class BannerFooterController extends Controller
{
    public function index()
    {
        $data_banner_footer = BannerFooter::orderBy('id', 'DESC')->get();
        return response()
            ->json([
                'message' => 'Data Banner',
                'data'    => $data_banner_footer,
            ], 200);

    }

}
