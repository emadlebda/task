<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
            <b>Viewing:</b> {{$application->subject}}
        </h2>

        <h4><b>user name:</b> {{$application->user->name}}</h4>
        <h4><b>user email:</b> {{$application->user->email}}</h4>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <b>Message:</b>
                    <br>
                    {{$application->message}}
                </div>

                <hr>
                <p class="mb-2">Attachment:</p>

                <img src="{{asset('storage').'/'.$application->attachment_link}}" width="400" height="400">
            </div>
        </div>
    </div>
</x-app-layout>
