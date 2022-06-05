<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TermCondition;
use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    public function index()
    {

        $data_term_condition = TermCondition::all();
        return response()
            ->json([
                'message' => 'Data Term & Condition',
                'data' => $data_term_condition,
            ], 200);
        
    }
}
