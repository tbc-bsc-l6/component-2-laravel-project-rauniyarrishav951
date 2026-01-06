{{-- resources/views/admin/modules/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Module Management')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Modules</h2>
    <button onclick="document.getElementById('addModuleModal').classList.remove('hidden')" 
            class="bg-blue-600 text-red px-4 py-2 rounded hover:bg-blue-700">
        Add New Module
    </button>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Code</th>
                <th class="px-6 py-3 text-left">Description</th>
                <th class="px-6 py-3 text-left">Status</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($modules as $module)
            <tr>
                <td class="px-6 py-4">{{ $module->name }}</td>
                <td class="px-6 py-4">{{ $module->code }}</td>
                <td class="px-6 py-4">{{ Str::limit($module->description, 50) }}</td>
                <td class="px-6 py-4">
                    <form action="{{ route('admin.modules.toggle', $module) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-3 py-1 text-xs rounded-full 
                            {{ $module->is_available ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                            {{ $module->is_available ? 'Available' : 'Unavailable' }}
                        </button>
                    </form>
                </td>
                <td class="px-6 py-4">
                    <div class="flex space-x-2">
                        <button onclick="openEditModuleModal({{ $module }})" 
                                class="text-blue-600 hover:text-blue-800">Edit</button>
                        <button onclick="openAttachTeacherModal({{ $module->id }})" 
                                class="text-green-600 hover:text-green-800">Assign Teacher</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Module Modal -->
<div id="addModuleModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-96">
        <h3 class="text-lg font-semibold mb-4">Add New Module</h3>
        <form action="{{ route('admin.modules.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Module Name</label>
                <input type="text" name="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Module Code</label>
                <input type="text" name="code" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="document.getElementById('addModuleModal').classList.add('hidden')"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-red rounded hover:bg-blue-700">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection