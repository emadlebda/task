<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Models\Application;
use App\Models\User;
use App\Notifications\NewApplicationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ApplicationsController extends Controller
{
    public function index()
    {
        $applications = Application::with('user')->whereIsAnswered(false)->paginate(10);
        return view('admin.applications.index', compact('applications'));
    }


    public function create()
    {
        return view('dashboard');
    }

    public function store(StoreApplicationRequest $request)
    {
        abort_if(auth()->user()->applications()->today()->count() > 0, 403, 'you already posted an application today, come again tomorrow');

        $image_path = $request->attachment->store('attachments');

        $application = auth()->user()->applications()->create(array_merge($request->validated(), ['attachment_link' => $image_path]));

        $admin = User::whereIsManager(1)->get();
        Notification::send($admin, new NewApplicationNotification($application));

        return redirect()->back()->with(['message' => 'Application sent successfully']);
    }


    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
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

    public function answer(Application $application)
    {
        $application->update(['is_answered' => true]);
        return redirect()->route('admin.applications.index');
    }
}
