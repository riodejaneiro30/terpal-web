@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="flex w-full">
        <div class="flex-1 py-8 px-4">
        </div>
        <div class="flex-1 py-8 px-8">
            <h1 class="text-2xl font-bold mb-4">Edit General Parameter</h1>
            <form action="{{ route('generalparameter.update', $generalparameter->general_parameter_id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="general_parameter_key" class="block text-sm font-medium text-gray-700">General Parameter Key</label>
                    <input type="text" name="general_parameter_key" id="general_parameter_key" value="{{ $generalparameter->general_parameter_key }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="general_parameter_description" class="block text-sm font-medium text-gray-700">Deskripsi General Parameter</label>
                    <input name="general_parameter_description" id="general_parameter_description" value="{{ $generalparameter->general_parameter_description }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="general_parameter_value" class="block text-sm font-medium text-gray-700">General Parameter Value</label>
                    <input type="text" name="general_parameter_value" id="general_parameter_value" value="{{ $generalparameter->general_parameter_value }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="w-32 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update</button>
                </div>
            </form>
        </div>
        <div class="flex-1 py-8 px-4">
        </div>
    </div>
</div>
@endsection
