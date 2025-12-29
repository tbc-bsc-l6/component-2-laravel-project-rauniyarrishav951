{{-- resources/views/admin/modules/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Module')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Module</h1>
        <a href="{{ route('admin.modules.index') }}" 
           class="text-gray-600 hover:text-gray-800 transition duration-200">
            ← Back to Modules
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.modules.update', $module) }}" method="POST">
            @csrf
            @method('PUT')  <!-- This converts POST to PUT -->
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Module Name *</label>
                <input type="text" name="name" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2"
                       value="{{ old('name', $module->name) }}">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Module Code *</label>
                <input type="text" name="code" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2"
                       value="{{ old('code', $module->code) }}">
                @error('code')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="4" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2">{{ old('description', $module->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.modules.index') }}" 
                   class="px-4 py-2 text-gray-600 hover:text-gray-800 transition duration-200 border border-gray-300 rounded">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-200">
                    Update Module
                </button>
            </div>
        </form>
        
        <!-- Status Toggle -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 mb-3">Module Status</h3>
            <form action="{{ route('admin.modules.toggle', $module) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">
                            Current status: 
                            <span class="font-medium {{ $module->is_available ? 'text-green-600' : 'text-red-600' }}">
                                {{ $module->is_available ? 'Available' : 'Unavailable' }}
                            </span>
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            Toggle the availability of this module for users.
                        </p>
                    </div>
                    <button type="submit" 
                            class="px-4 py-2 {{ $module->is_available ? 'bg-red-100 text-red-700 hover:bg-red-200' : 'bg-green-100 text-green-700 hover:bg-green-200' }} rounded transition duration-200">
                        {{ $module->is_available ? 'Mark as Unavailable' : 'Mark as Available' }}
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Delete Module -->
        <div class="mt-6 pt-6 border-t border-gray-200">
            <h3 class="text-lg font-medium text-red-700 mb-3">Danger Zone</h3>
            <form action="{{ route('admin.modules.destroy', $module) }}" method="POST" 
                  onsubmit="return confirmDelete()">
                @csrf
                @method('DELETE')
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">
                            Once deleted, this module cannot be recovered.
                        </p>
                    </div>
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition duration-200">
                        Delete Module
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this module? This action cannot be undone.');
}
</script>
@endsection