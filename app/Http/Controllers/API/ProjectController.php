<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() 
    {
        return response()->json([
        'success' => true,
        'code' => 200,
        'message' => 'OK',
        'data' => [
            1,
            2,
            3
        ],

        ]);
    }
}
