<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight">
            {{ __('DASHBOARD') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white ">
                    You're logged in!<br>
                    <h1 class="text-2xl">Available projects</h1>
                    <ul class="list-disc">
                      @foreach(Auth::user()->projects as $item)
                      <li class="ml-4">{{$item->name}}</li>
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
