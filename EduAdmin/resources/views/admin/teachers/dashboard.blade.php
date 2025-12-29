@extends('layouts.admin')

@section('title', 'Teacher Dashboard')

@section('content')
<div class="min-h-screen bg-green-200 p-6">
    <div class="max-w-7xl mx-auto bg-white rounded-3xl shadow-xl p-8">

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-10">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <p class="text-sm text-gray-500">Class overview & performance</p>
            </div>

            <div class="flex items-center gap-4">
               
                <span class="text-sm text-gray-600 font-medium">
                    {{ Auth::user()->name }}
                </span>
            </div>
        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

            <div class="bg-green-100 rounded-2xl p-6">
                <p class="text-sm text-gray-600">Modules</p>
                <h2 class="text-3xl font-bold text-green-700">
                    {{ $modules->count() }}
                </h2>
            </div>

            <div class="bg-yellow-100 rounded-2xl p-6">
                <p class="text-sm text-gray-600">Students</p>
                <h2 class="text-3xl font-bold text-yellow-600">
                    {{ $totalStudents }}
                </h2>
            </div>

            <div class="bg-orange-100 rounded-2xl p-6">
                <p class="text-sm text-gray-600">Pending</p>
                <h2 class="text-3xl font-bold text-orange-600">
                    {{ $pendingAssessments }}
                </h2>
            </div>

            <div class="bg-purple-100 rounded-2xl p-6">
                <p class="text-sm text-gray-600">Completion</p>
                <h2 class="text-3xl font-bold text-purple-600">68%</h2>
            </div>

        </div>

        <!-- STUDENT PROFICIENCY -->
        <div class="mb-10">
            <h2 class="text-lg font-bold mb-4">Students Proficiency</h2>

            <div class="bg-white rounded-2xl shadow border overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50 text-sm text-gray-600">
                        <tr>
                            <th class="px-6 py-4 text-left">Student</th>
                            <th class="px-6 py-4 text-center">Modules</th>
                            <th class="px-6 py-4 text-center">Average</th>
                            <th class="px-6 py-4">Progress</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($modules->flatMap->students->unique('id')->take(5) as $student)
                        <tr>
                            <td class="px-6 py-4 font-medium flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold">
                                    {{ substr($student->name,0,1) }}
                                </div>
                                {{ $student->name }}
                            </td>
                            <td class="px-6 py-4 text-center">3 / 5</td>
                            <td class="px-6 py-4 text-center">82%</td>
                            <td class="px-6 py-4">
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width:82%"></div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ASSIGNED MODULES -->
        <div class="mb-10">
            <h2 class="text-lg font-bold mb-4">My Assigned Modules</h2>

            <div class="space-y-6">
                @foreach($modules as $module)
                <div class="bg-gray-50 rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h3 class="text-lg font-bold">{{ $module->name }}</h3>
                            <p class="text-sm text-gray-500">Code: {{ $module->code }}</p>
                        </div>

                        <button
                            class="toggle-btn px-4 py-2 bg-purple-600 text-white rounded-lg"
                            data-id="{{ $module->id }}">
                            View Students
                        </button>
                    </div>

                    <!-- STUDENTS -->
                    <div id="students-{{ $module->id }}" class="hidden">
                        <table class="w-full bg-white rounded-xl overflow-hidden">
                            <thead class="bg-gray-100 text-sm">
                                <tr>
                                    <th class="px-4 py-3 text-left">Student</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @foreach($module->students as $student)
                                @php
                                    $status = $student->pivot->status ?? 'PENDING';
                                @endphp
                                <tr>
                                    <td class="px-4 py-3">{{ $student->name }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-3 py-1 rounded-full text-xs
                                            {{ $status=='PASS' ? 'bg-green-100 text-green-700' :
                                               ($status=='FAIL' ? 'bg-red-100 text-red-700' :
                                               'bg-yellow-100 text-yellow-700') }}">
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <form method="POST" action="{{ route('teacher.set-status') }}">
                                            @csrf
                                            <input type="hidden" name="module_id" value="{{ $module->id }}">
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            <select name="status"
                                                onchange="this.form.submit()"
                                                class="border rounded px-3 py-1 text-sm">
                                                <option disabled>Select</option>
                                                <option value="PASS">PASS</option>
                                                <option value="FAIL">FAIL</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
document.querySelectorAll('.toggle-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const box = document.getElementById('students-' + btn.dataset.id);
        box.classList.toggle('hidden');
        btn.textContent = box.classList.contains('hidden') ? 'View Students' : 'Hide Students';
    });
});
</script>
@endsection
