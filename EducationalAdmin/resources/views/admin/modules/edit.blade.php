@extends('layouts.admin')

@section('title', 'Edit Module')

@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Edit Module</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.modules.update', $module) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Module Name *</label>
                <input type="text" name="name" value="{{ old('name', $module->name) }}" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Module Code *</label>
                <input type="text" name="code" value="{{ old('code', $module->code) }}" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $module->description) }}</textarea>
            </div>
            
            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.modules.index') }}" 
                   class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update Module
                </button>
            </div>
        </form>
    </div>
</div>
@endsection