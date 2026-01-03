@extends('layouts.teacher')

@section('title', $module->name . ' - Students')

@section('content')
<div class="space-y-6">
    <!-- Module Header -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $module->name }}</h1>
                <div class="mt-2 flex items-center space-x-4">
                    <span class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-800">
                        Code: {{ $module->code }}
                    </span>
                    <span class="px-3 py-1 text-sm rounded-full {{ $module->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $module->is_available ? 'Available' : 'Unavailable' }}
                    </span>
                </div>
                @if($module->description)
                    <p class="mt-3 text-gray-600">{{ $module->description }}</p>
                @endif
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('teacher.dashboard') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    ← Back to Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- Students List -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Enrolled Students</h3>
                <span class="text-sm text-gray-600">{{ $module->students->count() }} students</span>
            </div>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Completion Date</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($module->students as $student)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-800 font-medium">
                                        {{ substr($student->name, 0, 2) }}
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-800">{{ $student->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-800">{{ $student->student_id }}</td>
                            <td class="px-4 py-3 text-sm text-gray-800">{{ $student->email }}</td>
                            <td class="px-4 py-3">
                                @php
                                    $status = $student->pivot->status;
                                    $statusColors = [
                                        'enrolled' => 'bg-blue-100 text-blue-800',
                                        'completed' => 'bg-green-100 text-green-800',
                                        'failed' => 'bg-red-100 text-red-800',
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-800">
                                {{ $student->pivot->grade ?? 'N/A' }}
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">
                                {{ $student->pivot->completed_at ? $student->pivot->completed_at->format('M d, Y') : 'Not completed' }}
                            </td>
                            <td class="px-4 py-3">
                                @if($student->pivot->status === 'enrolled')
                                    <div class="flex space-x-2">
                                        <!-- Pass Button -->
                                        <form action="{{ route('teacher.modules.students.update-status', ['module' => $module->id, 'student' => $student->id]) }}" 
                                              method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="completed">
                                            <button type="submit" 
                                                    onclick="return confirm('Mark {{ $student->name }} as PASSED?')"
                                                    class="text-green-600 hover:text-green-800 text-sm font-medium">
                                                Pass
                                            </button>
                                        </form>
                                        
                                        <!-- Fail Button -->
                                        <form action="{{ route('teacher.modules.students.update-status', ['module' => $module->id, 'student' => $student->id]) }}" 
                                              method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="failed">
                                            <button type="submit" 
                                                    onclick="return confirm('Mark {{ $student->name }} as FAILED?')"
                                                    class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Fail
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-sm text-gray-500">Completed</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                No students enrolled in this module yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Status Summary -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-blue-50 p-4 rounded-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-2 rounded-full bg-blue-100">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.67 3.913a4 4 0 01-5.243-5.243M21 21v-1a6 6 0 00-4-5.659"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-blue-800">Enrolled</p>
                            <p class="text-2xl font-bold text-blue-900">
                                {{ $module->enrolledStudents()->count() }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-50 p-4 rounded-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-2 rounded-full bg-green-100">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">Completed</p>
                            <p class="text-2xl font-bold text-green-900">
                                {{ $module->completedStudents()->count() }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-red-50 p-4 rounded-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-2 rounded-full bg-red-100">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">Failed</p>
                            <p class="text-2xl font-bold text-red-900">
                                {{ $module->failedStudents()->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection