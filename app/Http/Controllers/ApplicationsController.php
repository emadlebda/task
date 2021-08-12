<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
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
        return view('dashboard');
    }

    public function store(StoreApplicationRequest $request)
    {
        $image_path = $request->attachment->storeAs('attachments', $request->attachment->getClientOriginalName());

        auth()->user()->applications()->create(
            array_merge($request->validated(), ['attachment_link' => $image_path])
        );


        //send email to manager

        return redirect()->back();
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
