<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(3);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'OK',
            'projects' => $projects
        ]);
    }

    public function show($id)
    {
        $project = Project::where('id', $id)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'projects' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Not found'
            ]);
        }
    }
}
