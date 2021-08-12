<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Feedback form
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Feedback Information</h3>
                                </div>
                            </div>

                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="{{route('applications.store')}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @if(session()->has('message'))
                                        <div class="text-green-400 text-sm">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid w-full">
                                                <div class="col-span-9 sm:col-span-3 mb-3">
                                                    @error('subject')
                                                    <div class="alert text-red-500 text-sm">{{ $message }}</div>
                                                    @enderror
                                                    <label for="subject"
                                                           class="block text-sm font-medium text-gray-700">Subject
                                                    </label>
                                                    <input type="text" name="subject" id="subject"
                                                           autocomplete="Subject"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-9 sm:col-span-3 mb-3">

                                                    @error('message')
                                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                                    @enderror
                                                    <label for="message"
                                                           class="block text-sm font-medium text-gray-700">Message
                                                    </label>
                                                    <textarea name="message" id="message" rows="10"
                                                              class="w-full h-16 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline"></textarea>
                                                </div>

                                                <div class="col-span-9 sm:col-span-3">
                                                    @error('attachment')
                                                    <div class="alert text-red-500 text-sm">{{ $message }}</div>
                                                    @enderror
                                                    <label for="attachment"
                                                           class="block text-sm font-medium text-gray-700">Attachment
                                                    </label>
                                                    <input type="file" name="attachment">
                                                </div>


                                            </div>
                                        </div>

                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit"
                                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
