<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
        <a href="/categories/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 float-right" style="position: relative; top: -40px;">Add Category</a>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                

                @if (count($categories) == 0)
                    <b>No categories found</b>
                @else
                       




                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Category name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" style="width: 200px" class="px-6 py-3">

                                    </th>
    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td  class="px-6 py-3">
                                        {{ $category->name }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $category->description }}
                                    </td>
                                    <td class="px-6 py-3">
                                        <a href="/categories/edit/{{ $category->id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">edit</a>
                                        <a href="/categories/delete/{{ $category->id }}" onclick="return confirm('Are you sure you want to delete this category?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif

            </div>
        </div>
    </div>

</x-app-layout>
