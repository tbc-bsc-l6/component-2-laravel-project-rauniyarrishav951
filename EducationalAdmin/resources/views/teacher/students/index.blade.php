@extends('layouts.teacher')

@section('title', 'My Students')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">My Students</h1>
                <p class="text-gray-600 mt-2">All students enrolled in your modules</p>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    {{ $students->count() }} total students
                </span>
            </div>
        </div>
    </div>

    <!-- Students Table -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Student List</h3>
                <div class="flex space-x-2">
                    <input type="text" 
                           placeholder="Search students..." 
                           class="px-3 py-2 border border-gray-300 rounded-md text-sm w-64"
                           id="searchStudents">
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="studentsTable">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modules Enrolled</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Completed</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($students as $student)
                        <tr class="hover:bg-gray-50 student-row">
                            <td class="px-4 py-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-800 font-medium">
                                        {{ substr($student->name, 0, 2) }}
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-800 student-name">{{ $student->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $student->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-800">{{ $student->student_id }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $student->modules->count() }} modules
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @php
                                    $completed = $student->modules->where('pivot.status', 'completed')->count();
                                    $total = $student->modules->count();
                                    $completionRate = $total > 0 ? round(($completed / $total) * 100) : 0;
                                @endphp
                                <div class="flex items-center">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: {{ $completionRate }}%"></div>
                                    </div>
                                    <span class="ml-2 text-sm text-gray-600">{{ $completionRate }}%</span>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                @php
                                    $allCompleted = $student->modules->count() > 0 && 
                                                   $student->modules->every(function ($module) {
                                                       return in_array($module->pivot->status, ['completed', 'failed']);
                                                   });
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $allCompleted ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $allCompleted ? 'All Modules Completed' : 'In Progress' }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex space-x-2">
                                    @foreach($student->modules as $module)
                                        <a href="{{ route('teacher.modules.show', $module->id) }}" 
                                           class="text-blue-600 hover:text-blue-800 text-sm">
                                            {{ $module->code }}
                                        </a>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                No students found in your modules.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Simple search functionality
    document.getElementById('searchStudents').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#studentsTable .student-row');
        
        rows.forEach(row => {
            const name = row.querySelector('.student-name').textContent.toLowerCase();
            const email = row.querySelector('.text-gray-600').textContent.toLowerCase();
            
            if (name.includes(searchTerm) || email.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection