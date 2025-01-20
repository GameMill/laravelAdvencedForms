<x-app-layout>
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {!! $form !!}
<!--
                <form method="POST" action="/categories/create" enctype="multipart/form-data">
                    @csrf
  
                    <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name') }}">
                    </div>

                    @error('name')
                        <div class="px-4 py-1 bg-red-100 text-red-700 sm:p-6" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror

                    <div class="px-4 py-5 bg-white sm:p-6">
                        <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                        <textarea name="description" id="description" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ old('description') }}</textarea>
                    </div>

                    @error('description')
                        <div class="px-4 py-1 bg-red-100 text-red-700 sm:p-6" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </div>
                </form>
            -->
            </div>
        </div>
    </div>

    
</div>
</x-app-layout>