<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex m-2 p-2">
                <a href="{{route('admin.menus.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Menu Index</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
              <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">

                <form method="POST" action="{{route('admin.reservation.update',$reservations->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="sm:col-span-6">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <div class="mt-1">
                        <input type="text" id="first_name" wire:model.lazy='first_name' name="first_name" value="{{$reservations->first_name}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                    </div>
                    @error('first_name')
                        <div class="text-sm text-red-400">{{$message}}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <div class="mt-1">
                        <input type="text"  id="last_name" wire:model.lazy='newPrice' name="last_name" value="{{$reservations->last_name}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                    </div>
                    @error('last_name')
                        <div class="text-sm text-red-400">{{$message}}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input type="email" id="email" wire:model.lazy='email' name="email" value="{{$reservations->email}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                    </div>
                    @error('email')
                        <div class="text-sm text-red-400">{{$message}}</div>
                    @enderror
                </div><br>
                <div class="sm:col-span-6">
                    <label for="tel_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <div class="mt-1">
                        <input type="text" id="tel_number" wire:model.lazy='tel_number' name="tel_number" value="{{$reservations->tel_number}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                    </div>
                    @error('tel_number')
                        <div class="text-sm text-red-400">{{$message}}</div>
                    @enderror
                </div><br>
                <div class="sm:col-span-6">
                    <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                    <div class="mt-1">
                            <input type="datetime-local" id="res_date" wire:model.lazy='res_date' name="res_date" value="{{$reservations->res_date}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                        </div>
                        @error('res_date')
                        <div class="text-sm text-red-400">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="sm:col-span-6">
                        <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                        <div class="mt-1">
                            <input type="number" id="guest_number" wire:model.lazy='guest_number' name="guest_number" value="{{$reservations->guest_number}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                        </div>
                        @error('guest_number')
                        <div class="text-sm text-red-400">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="sm:col-span-6">
                        <label for="table_id" class="block text-sm font-medium text-gray-700">Table</label>
                        <div class="mt-1">
                        <select id="table_id" name="table_id" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2" >
                            @foreach($tables as $table)
                            <option value="{{$table->id}}"@selected($table->id == $reservations->table_id)>{{$table->name}} ({{$table->guest_number}} Guests)</option>
                            @endforeach
                        </select>
                    </div>
                    @error('table_id')
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
