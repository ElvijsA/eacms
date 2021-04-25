<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight">
            {{ __('USERS') }}

        </h2>
        <div class="justify-end">
        <a style="margin: 19px;" href="{{ route('users.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">New User</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                  <!-- CONTENT HERE -->
                  @if(session()->get('success'))
                  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{ session()->get('success') }}</strong>
                  </div>
                  @endif

                  <table class="table-auto w-full">
                  <thead>
                      <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                      </tr>
                  </thead>
                  <tbody class="border-b-2">
                      @foreach($items as $item)
                      <tr class="border-t-2">
                          <td class=" px-4 py-2">{{$item->id}}</td>
                          <td class=" px-4 py-2">{{$item->name}}</td>
                          <td class=" px-4 py-2 flex justify-end">
                              <a href="{{ route('users.show',$item->id)}}" class="py-1 px-2 mx-1 bg-green-500 hover:bg-green-700 text-white font-bold focus:outline-none focus:shadow-outline">View</a>
                              <a href="{{ route('users.edit',$item->id)}}" class="py-1 px-2 mx-1 bg-blue-500 hover:bg-blue-700 text-white font-bold focus:outline-none focus:shadow-outline">Edit</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>

                <!-- PAGINATION -->

            </div>
        </div>
    </div>
</x-app-layout>
