@extends('layouts.admin')

@section('title', 'Teacher Management')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Teachers</h2>
    <a href="{{ route('admin.teachers.create') }}" 
       class="bg-blue-600 text-red px-4 py-2 rounded hover:bg-blue-700">
        Create New Teacher
    </a>
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
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">Phone</th>
                <th class="px-6 py-3 text-left">Status</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($teachers ?? [] as $teacher)
            <tr>
                <td class="px-6 py-4">{{ $teacher->name }}</td>
                <td class="px-6 py-4">{{ $teacher->email }}</td>
                <td class="px-6 py-4">{{ $teacher->phone ?? 'N/A' }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 text-xs rounded-full 
                        {{ $teacher->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $teacher->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.teachers.edit', $teacher) }}" 
                           class="text-blue-600 hover:text-blue-800 hover:underline">Edit</a>
                        
                        <form action="{{ route('admin.teachers.destroy', $teacher) }}" 
                              method="POST" 
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this teacher?');">
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
                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                    No teachers found. Click "Add New Teacher" to create one.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection