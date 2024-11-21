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
        // Esempio filtraggio per title
        // $titleParam = request()->input('title');
        // if(isset($titleParam)) {
        //     $project = $project->where('title', 'LIKE', '%'.$titleParam.'%');
        // }

        // $projects = Project::get();
        // $projects = Project::paginate(3);
     
        $projects = Project::with('type', 'technologies'); // Eager loading con il with

        $projects = $projects->paginate(3);              // Paginazione

        // serializzazione con il json
        return response()->json([
        'success' => true,
        'code' => 200,
        // 'message' => 'OK',
        'projects' => $projects
        ,
        // richiamato e utilizzato il Model Project per avere nella risposta per avere tutti i project esistente nel db come risposta in formato json

        ]);
    }

    public function show(string $slug) 
    {
        // $project = Project::where('slug', $slug)->firstOrFail(); first of fail per il 404 
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'projects' => $projects,
                ]);
        }
        else {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Project not found'
            ]);
        }
    }
}