<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{route('admin.table.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Table</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Guest
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Location
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables as $table)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$table->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$table->guest_number}}
                            </td>
                            <td class="px-6 py-4">
                                {{$table->status->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$table->location->name}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{route('admin.table.edit',$table->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="{{route('admin.table.destroy',$table->id)}}"

                                    onsubmit="return confirm('Are You Sure');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-6 py-4 font-medium bg-red-500 hover:bg-red-700 text-white rounded-full ">Delete</button>
                                </form>
                               </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
