<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex m-2 p-2">
                <a href="{{route('admin.table.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Table Index</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
              <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">

               <form method="POST" action="{{route('admin.table.update',$tables->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1">
                        <input type="text" id="name" wire:model.lazy='title' name="name" value="{{$tables->name}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                    </div>
                    @error('name')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                    <div class="mt-1">
                        <input type="number" min="1" max="10" id="guest_number" wire:model.lazy='title' name="guest_number" value="{{$tables->guest_number  }}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                    </div>
                    @error('guest_number')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <div class="mt-1">
                        <select id="status" name="status" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2" >
                        @foreach(App\Enums\TableStatus::cases() as $status)
                        <option value="{{$status->value}}" @selected($tables->status->value==$status->value)>{{$status->name}}</option>

                        @endforeach
                        </select>
                    </div>
                    @error('status')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <div class="mt-1">
                        <select id="location" name="location" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2" >
                        @foreach(App\Enums\TableLocation::cases() as $location)
                        <option value="{{$location->value}}" @selected($tables->status->value==$location->value)>{{$location->name}}</option>

                        @endforeach
                        </select>
                    </div>
                    @error('location')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                </div>



                <div class="mt-6 p-2">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                </div>

            </form>
            </div>

            </div>




        </div>
    </div>
</x-admin-layout>
