@extends('layouts.admin')

@section('title', 'Assign Modules to Teachers')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Assign Modules to Teachers</h1>
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.assign-module-to-teacher') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="teacher">
                    Select Teacher
                </label>
                <select name="teacher_id" id="teacher" class="w-full border rounded-lg p-2">
                    <option value="">Select a teacher</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }} ({{ $teacher->email }})</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="modules">
                    Select Modules
                </label>
                <select name="module_ids[]" id="modules" class="w-full border rounded-lg p-2" multiple size="5">
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }} ({{ $module->code }})</option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-1">Hold Ctrl to select multiple modules</p>
            </div>
            
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Assign Modules
            </button>
        </form>
    </div>
    
    <!-- Current Assignments -->
    <div class="mt-8 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Current Module Assignments</h2>
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 text-left">Teacher</th>
                    <th class="py-2 px-4 text-left">Assigned Modules</th>
                    <th class="py-2 px-4 text-left">Students</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                    @if($teacher->modules->count() > 0)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $teacher->name }}</td>
                        <td class="py-3 px-4">
                            @foreach($teacher->modules as $module)
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm mr-2">
                                    {{ $module->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="py-3 px-4">
                            @foreach($teacher->modules as $module)
                                <div class="text-sm">
                                    {{ $module->name }}: {{ $module->students->count() }} students
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection