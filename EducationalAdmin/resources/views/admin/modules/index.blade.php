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

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Code</th>
                <th class="px-6 py-3 text-left">Description</th>
                <th class="px-6 py-3 text-left">Assigned Teacher</th>
                <th class="px-6 py-3 text-left">Status</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($modules as $module)
            <tr>
                <td class="px-6 py-4">{{ $module->name }}</td>
                <td class="px-6 py-4">{{ $module->code }}</td>
                <td class="px-6 py-4">{{ Str::limit($module->description, 50) }}</td>
                <td class="px-6 py-4">
                    @if($module->teacher)
                        {{ $module->teacher->name }}
                    @else
                        <span class="text-gray-500">Not assigned</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <form action="{{ route('admin.modules.toggle', $module) }}" method="POST" class="inline">
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
                        <!-- Edit Button -->
                        <a href="{{ route('admin.modules.edit', $module) }}" 
                           class="text-blue-600 hover:text-blue-800 hover:underline">Edit</a>
                        
                        <!-- Assign Teacher Button -->
                        <button onclick="openAssignTeacherModal({{ $module->id }})" 
                                class="text-green-600 hover:text-green-800 hover:underline">Assign Teacher</button>

                        
                        <!-- Delete Button -->
                        <form action="{{ route('admin.modules.destroy', $module) }}" 
                              method="POST" 
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this module?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:text-red-800 hover:underline">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                    No modules found. Click "Add New Module" to create your first module.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>



<!-- Assign Teacher Modal -->
<div id="assignTeacherModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-96">
        <h3 class="text-lg font-semibold mb-4">Assign Teacher</h3>
        <form id="assignTeacherForm" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Select Teacher *</label>
                <select name="teacher_id" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">-- Select a Teacher --</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">
                            {{ $teacher->name }} ({{ $teacher->email }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeAssignTeacherModal()"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-red rounded hover:bg-green-700">Assign</button>
            </div>
        </form>
    </div>
</div>

<!-- Add Module Modal -->
<div id="addModuleModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-96">
        <h3 class="text-lg font-semibold mb-4">Add New Module</h3>
        <form action="{{ route('admin.modules.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Module Name *</label>
                <input type="text" name="name" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Module Code *</label>
                <input type="text" name="code" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="3" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="document.getElementById('addModuleModal').classList.add('hidden')"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-red rounded hover:bg-blue-700">Add Module</button>
            </div>
        </form>
    </div>
</div>

<!-- Assign Teacher Modal -->
<div id="assignTeacherModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-96">
        <h3 class="text-lg font-semibold mb-4">Assign Teacher</h3>
        <form id="assignTeacherForm" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Select Teacher *</label>
                <select name="teacher_id" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">-- Select a Teacher --</option>
                    @foreach($teachers ?? [] as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }} ({{ $teacher->email }})</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeAssignTeacherModal()"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Assign</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for Modals -->
<script>
    let currentModuleId = null;

    function openAssignTeacherModal(moduleId) {
        currentModuleId = moduleId;
        const form = document.getElementById('assignTeacherForm');
        form.action = `/admin/modules/${moduleId}/assign-teacher`;
        document.getElementById('assignTeacherModal').classList.remove('hidden');
    }

    function closeAssignTeacherModal() {
        document.getElementById('assignTeacherModal').classList.add('hidden');
        currentModuleId = null;
    }

    // Close modals when clicking outside
    document.addEventListener('click', function(event) {
        const addModal = document.getElementById('addModuleModal');
        const assignModal = document.getElementById('assignTeacherModal');
        
        if (event.target === addModal) {
            addModal.classList.add('hidden');
        }
        if (event.target === assignModal) {
            closeAssignTeacherModal();
        }
    });
</script>
@endsection