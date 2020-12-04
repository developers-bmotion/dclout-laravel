<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexListProjects()
    {
        return view('frontend.projects.list-project');
    }

    public function getListProjects(){
        $listProjects = Project::all();
        return response()->json(['data' => $listProjects]);
    }
}
