{{-- resources/views/admin/modules/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manage your Module Here')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800"></h1>
    <button onclick="document.getElementById('addModuleModal').classList.remove('hidden')" 
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">
        Add New Module
    </button>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
        {{ session('error') }}
    </div>
@endif

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($modules as $module)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $module->name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $module->code }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm text-gray-900">{{ Str::limit($module->description, 50) }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <form action="{{ route('admin.modules.toggle', $module) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-3 py-1 text-xs rounded-full transition duration-200
                            {{ $module->is_available ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                            {{ $module->is_available ? 'Available' : 'Unavailable' }}
                        </button>
                    </form>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.modules.edit', $module) }}" 
                           class="text-blue-600 hover:text-blue-800 transition duration-200">Edit</a>
                        <span class="text-gray-300">|</span>
                        <form action="{{ route('admin.modules.destroy', $module) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Are you sure you want to delete this module? This action cannot be undone.')"
                                    class="text-red-600 hover:text-red-800 transition duration-200">
                                Remove
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @if($modules->isEmpty())
    <div class="text-center py-8">
        <p class="text-gray-500">No modules found. Add your first module!</p>
    </div>
    @endif
</div>




<!-- Add Module Modal -->
<div id="addModuleModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-96 max-w-md mx-4">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">Add New Module</h3>
        <form action="{{ route('admin.modules.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Module Name</label>
                <input type="text" name="name" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       placeholder="Enter module name">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Module Code</label>
                <input type="text" name="code" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       placeholder="e.g., CS101">
                @error('code')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="3" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                          placeholder="Enter module description"></textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" 
                        onclick="document.getElementById('addModuleModal').classList.add('hidden')"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800 transition duration-200">
                    Cancel
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-200">
                    Add Module
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Close modal on outside click -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('addModuleModal');
    
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            modal.classList.add('hidden');
        }
    });
});
</script>
@endsection