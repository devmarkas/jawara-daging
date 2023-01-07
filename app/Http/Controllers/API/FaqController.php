<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $data_faq = Faq::orderBy('id', 'DESC')->get();
        return response()
            ->json([
                'message' => 'Data FAQ',
                'data'    => $data_faq,
            ], 200);
    }
}
