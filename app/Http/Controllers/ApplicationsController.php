<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index()
    {
        $applications = Application::with('user')->paginate(10);
        return view('admin.applications.index', compact('applications'));
    }


    public function create()
    {
        
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Application $application)
    {
        //
    }


    public function edit(Application $application)
    {
        //
    }


    public function update(Request $request, Application $application)
    {
        //
    }


    public function destroy(Application $application)
    {
        //
    }
}
