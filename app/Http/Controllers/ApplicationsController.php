<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Models\Application;
use App\Models\User;
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
        abort_if(auth()->user()->applications()->today()->count() > 0, 403, 'you already posted an application today, come again tomorrow');

        $image_path = $request->attachment->storeAs('attachments', $request->attachment->getClientOriginalName());

        auth()->user()->applications()->create(
            array_merge($request->validated(), ['attachment_link' => $image_path])
        );


        //send email to manager

        return redirect()->back()->with(['message' => 'Application sent successfully']);
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
