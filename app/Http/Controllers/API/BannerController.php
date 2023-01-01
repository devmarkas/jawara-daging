<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {

        $data_banner = Banner::orderBy('id', 'DESC')->get();
        return response()
            ->json([
                'message' => 'Data Banner',
                'data' => $data_banner,
            ], 200);

    }
}
