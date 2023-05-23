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

                <form method="POST" action="{{route('admin.menus.update',$menus->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1">
                        <input type="text" id="name" wire:model.lazy='title' name="name" value="{{$menus->name}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                    </div>
                    @error('name')
                        <div class="text-sm text-red-400">{{$message}}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">price</label>
                    <div class="mt-1">
                        <input type="number" min="0" id="price" wire:model.lazy='newPrice' name="price" value="{{$menus->price}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                    </div>
                    @error('price')
                        <div class="text-sm text-red-400">{{$message}}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">Image</label>
                    <div class="mt-1">
                        <input type="file" id="image" wire:model.lazy='newImage' name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                    </div>
                    <img src="{{Storage::url($menus->image)}}"class="w-32 h-32" alt="">
                </div>
                @error('image')
                        <div class="text-sm text-red-400">{{$message}}</div>
                    @enderror<br>
                <div class="sm:col-span-6">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <div class="mt-1">
                        <textarea name="description" id="description" cols="60" rows="2" wire:model.lazy='body' class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2">{{$menus->description}}</textarea>
                    </div>
                    @error('description')
                        <div class="text-sm text-red-400">{{$message}}</div>
                    @enderror
                </div><br>
                <div class="sm:col-span-6">
                    <label for="body" class="block text-sm font-medium text-gray-700">Categories</label>
                    <div class="mt-1">
                        <select id="categories" name="categories" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2" >
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('categories')
                        <div class="text-sm text-red-400">{{$message}}</div>
                    @enderror
                </div>
                <div class="mt-6 p-2">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                </div>

            </form>
            </div>

            </div>




        </div>
    </div>
</x-admin-layout>
