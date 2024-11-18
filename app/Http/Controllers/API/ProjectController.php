<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() 
    {
        // $projects = Project::get();
        // $projects = Project::paginate(3);
        // eager loading 
        $projects = Project::with('type', 'technologies')->paginate(3);

        // serializzazione
        return response()->json([
        'success' => true,
        'code' => 200,
        'message' => 'OK',
        'data' => [
            'projects' => $projects
        ],
        // richiamato e utilizzato il Model Project per avere nella risposta per avere tutti i project esistente nel db come risposta in formato json

        ]);
    }
}
