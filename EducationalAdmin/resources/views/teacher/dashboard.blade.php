@extends('layouts.teacher')

@section('title', 'Teacher Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Header -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-600 mt-2">Manage your modules and students here.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    {{ now()->format('l, F j, Y') }}
                </span>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Assigned Modules -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Assigned Modules</p>
                    <p class="text-2xl font-semibold text-gray-800">
                        @php
                            // Safe way to get count
                            $moduleCount = isset($assignedModules) ? $assignedModules->count() : 0;
                            echo $moduleCount;
                        @endphp
                    </p>
                </div>
            </div>
        </div>

        <!-- Total Students -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.67 3.913a4 4 0 01-5.243-5.243M21 21v-1a6 6 0 00-4-5.659"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Students</p>
                    <p class="text-2xl font-semibold text-gray-800">
                        {{ $totalStudents ?? 0 }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Completion Rate -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Avg. Completion</p>
                    <p class="text-2xl font-semibold text-gray-800">
                        0%
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- My Modules -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">My Assigned Modules</h3>
        </div>
        <div class="p-6">
            @php
                // Safe check for modules
                $hasModules = isset($assignedModules) && $assignedModules->count() > 0;
            @endphp
            
            @if($hasModules)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Module</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Students</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($assignedModules as $module)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <div>
                                        <p class="font-medium text-gray-800">{{ $module->name }}</p>
                                        <p class="text-sm text-gray-600">{{ Str::limit($module->description, 50) }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-800">{{ $module->code }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs rounded-full {{ $module->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $module->is_available ? 'Available' : 'Unavailable' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                        {{ $module->students()->count() }} students
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">
                                        View Students
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8 text-gray-500">
                    <svg class="w-12 h-12 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <p class="mt-2">No modules assigned yet.</p>
                    <p class="text-sm mt-1">Please contact the administrator to assign modules to you.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Quick Information -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Teacher Information</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-4 bg-blue-50 rounded-lg">
                    <h4 class="font-semibold text-blue-800 mb-2">Your Profile</h4>
                    <p class="text-blue-700"><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p class="text-blue-700"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p class="text-blue-700"><strong>Teacher ID:</strong> {{ $teacher->id ?? 'N/A' }}</p>
                    <p class="text-blue-700"><strong>Status:</strong> {{ ($teacher->is_active ?? false) ? 'Active' : 'Inactive' }}</p>
                </div>
                
                <div class="p-4 bg-green-50 rounded-lg">
                    <h4 class="font-semibold text-green-800 mb-2">Quick Actions</h4>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('teacher.students.index') }}" class="text-green-700 hover:text-green-900 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.67 3.913a4 4 0 01-5.243-5.243M21 21v-1a6 6 0 00-4-5.659"/>
                                </svg>
                                View Students
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.modules.index') }}" class="text-green-700 hover:text-green-900 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                Browse All Modules
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection