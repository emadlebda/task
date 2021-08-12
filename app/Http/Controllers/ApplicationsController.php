<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Models\Application;
use App\Models\User;
use App\Notifications\NewApplicationNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class ApplicationsController extends Controller
{
    public function index(): View
    {
        $applications = Application::with('user')->whereIsAnswered(false)->paginate(10);
        return view('admin.applications.index', compact('applications'));
    }


    public function create(): View
    {
        return view('dashboard');
    }

    public function store(StoreApplicationRequest $request): RedirectResponse
    {
        abort_if(auth()->user()->applications()->today()->count() > 0, 403, 'you already posted an application today, come back again tomorrow');

        $image_path = $request->attachment->store('attachments');

        $application = auth()->user()->applications()->create(array_merge($request->validated(), ['attachment_link' => $image_path]));

        $application->load('user');
        $admin = User::whereIsManager(1)->get();
        Notification::send($admin, new NewApplicationNotification($application));

        return redirect()->back()->with(['message' => 'Application sent successfully']);
    }


    public function show(Application $application): View
    {
        return view('admin.applications.show', compact('application'));
    }


    public function answer(Application $application): RedirectResponse
    {
        $application->update(['is_answered' => true]);
        return redirect()->route('admin.applications.index');
    }
}
