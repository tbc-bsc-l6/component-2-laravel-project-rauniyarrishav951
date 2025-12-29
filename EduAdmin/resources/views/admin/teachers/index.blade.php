@extends('layouts.admin')

@section('title', 'Manage Teacher on your platform')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
           
        </div>
        <button id="addTeacherBtn" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Teacher
        </button>
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
        {{ session('error') }}
    </div>
    @endif

    <!-- Stats Card -->
    
        <div class="flex items-center justify-between">
           
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Teachers Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">All Teachers</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teacher</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($teachers as $teacher)
                    <tr class="hover:bg-gray-50">
                        <!-- Teacher Info -->
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                        <span class="text-blue-600 font-semibold">
                                            {{ strtoupper(substr($teacher->name, 0, 2)) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $teacher->name }}</div>
                                    <div class="text-sm text-gray-500">ID: {{ $teacher->id }}</div>
                                </div>
                            </div>
                        </td>
                        
                        <!-- Email -->
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $teacher->email }}</div>
                            <div class="text-xs text-gray-500">
                                @if($teacher->email_verified_at)
                                    <span class="text-green-600">Verified</span>
                                @else
                                    <span class="text-yellow-600">Not verified</span>
                                @endif
                            </div>
                        </td>
                        
                        <!-- Status -->
                        <td class="px-6 py-4">
                            @if($teacher->is_active ?? true)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Inactive
                                </span>
                            @endif
                        </td>
                        
                        <!-- Created At -->
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $teacher->created_at->format('M d, Y') }}
                            <div class="text-xs text-gray-400">
                                {{ $teacher->created_at->diffForHumans() }}
                            </div>
                        </td>
                        
                        <!-- Actions -->
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button onclick="openEditTeacherModal({{ $teacher->id }})"
                                        class="text-blue-600 hover:text-blue-900 p-1" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                
                                <form action="{{ route('admin.teachers.destroy', $teacher) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this teacher?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 p-1" title="Delete">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <p class="text-lg font-medium mb-2">No teachers found</p>
                                <p class="text-gray-600 mb-4">Get started by adding your first teacher</p>
                                <button id="addTeacherBtnEmpty" 
                                    
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Teacher Modal -->
<div id="addTeacherModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg w-full max-w-md">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Add New Teacher</h3>
            <form action="{{ route('admin.teachers.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                        <input type="text" name="name" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Enter teacher's full name">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                        <input type="email" name="email" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Enter teacher's email">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password *</label>
                        <input type="password" name="password" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Enter password (min. 8 characters)">
                    </div>
                </div>
                
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" id="closeAddTeacherModalBtn"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Add Teacher
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Teacher Modal -->
<div id="editTeacherModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg w-full max-w-md">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Edit Teacher</h3>
            <form id="editTeacherForm" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                        <input type="text" name="name" id="editTeacherName" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                        <input type="email" name="email" id="editTeacherEmail" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">New Password (optional)</label>
                        <input type="password" name="password" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Leave blank to keep current password">
                    </div>
                </div>
                
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" id="closeEditTeacherModalBtn"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Teacher
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Simple Inline Script - This should definitely work -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded - setting up teacher management');
    
    // Get modal elements
    const addTeacherModal = document.getElementById('addTeacherModal');
    const editTeacherModal = document.getElementById('editTeacherModal');
    
    // Get button elements
    const addTeacherBtn = document.getElementById('addTeacherBtn');
    const addTeacherBtnEmpty = document.getElementById('addTeacherBtnEmpty');
    const closeAddTeacherModalBtn = document.getElementById('closeAddTeacherModalBtn');
    const closeEditTeacherModalBtn = document.getElementById('closeEditTeacherModalBtn');
    
    // Function to open add teacher modal
    function openAddTeacherModal() {
        console.log('Opening add teacher modal');
        if (addTeacherModal) {
            addTeacherModal.classList.remove('hidden');
            addTeacherModal.classList.add('flex');
        }
    }
    
    // Function to close add teacher modal
    function closeAddTeacherModal() {
        console.log('Closing add teacher modal');
        if (addTeacherModal) {
            addTeacherModal.classList.add('hidden');
            addTeacherModal.classList.remove('flex');
        }
    }
    
    // Function to open edit teacher modal
    function openEditTeacherModal(teacherId) {
        console.log('Opening edit teacher modal for ID:', teacherId);
        // Set up the form action
        const editForm = document.getElementById('editTeacherForm');
        if (editForm) {
            editForm.action = `/admin/teachers/${teacherId}`;
        }
        
        if (editTeacherModal) {
            editTeacherModal.classList.remove('hidden');
            editTeacherModal.classList.add('flex');
        }
    }
    
    // Function to close edit teacher modal
    function closeEditTeacherModal() {
        console.log('Closing edit teacher modal');
        if (editTeacherModal) {
            editTeacherModal.classList.add('hidden');
            editTeacherModal.classList.remove('flex');
        }
    }
    
    // Make functions available globally
    window.openAddTeacherModal = openAddTeacherModal;
    window.closeAddTeacherModal = closeAddTeacherModal;
    window.openEditTeacherModal = openEditTeacherModal;
    window.closeEditTeacherModal = closeEditTeacherModal;
    
    // Add event listeners
    if (addTeacherBtn) {
        addTeacherBtn.addEventListener('click', openAddTeacherModal);
    }
    
    if (addTeacherBtnEmpty) {
        addTeacherBtnEmpty.addEventListener('click', openAddTeacherModal);
    }
    
    if (closeAddTeacherModalBtn) {
        closeAddTeacherModalBtn.addEventListener('click', closeAddTeacherModal);
    }
    
    if (closeEditTeacherModalBtn) {
        closeEditTeacherModalBtn.addEventListener('click', closeEditTeacherModal);
    }
    
    // Close modals when clicking outside
    if (addTeacherModal) {
        addTeacherModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeAddTeacherModal();
            }
        });
    }
    
    if (editTeacherModal) {
        editTeacherModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditTeacherModal();
            }
        });
    }
    
    // Close modals with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAddTeacherModal();
            closeEditTeacherModal();
        }
    });
});
</script>
@endsection