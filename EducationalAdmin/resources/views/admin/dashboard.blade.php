
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Header -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Hello, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-600 mt-2">Here's what's happening with your educational system today.</p>
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
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Students Card -->
        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.67 3.913a4 4 0 01-5.243-5.243M21 21v-1a6 6 0 00-4-5.659"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Students</p>
                    <p class="text-2xl font-semibold text-gray-800">{{ App\Models\User::where('role', 'student')->count() }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                    View all
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Total Teachers Card -->
        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Teachers</p>
                    <p class="text-2xl font-semibold text-gray-800">{{ App\Models\Teacher::count() }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.teachers.index') }}" class="text-green-600 hover:text-green-800 text-sm font-medium flex items-center">
                    View all
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Total Modules Card -->
        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Modules</p>
                    <p class="text-2xl font-semibold text-gray-800">{{ App\Models\Module::count() }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.modules.index') }}" class="text-purple-600 hover:text-purple-800 text-sm font-medium flex items-center">
                    View all
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Active Users Card -->
        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Active Today</p>
                    <p class="text-2xl font-semibold text-gray-800">
                        {{ App\Models\User::whereDate('last_login_at', today())->count() }}
                    </p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-xs text-gray-500">Last updated: {{ now()->format('h:i A') }}</span>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Modules -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Recent Modules</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @forelse(App\Models\Module::latest()->take(5)->get() as $module)
                    <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="flex items-center">
                            <div class="p-2 rounded-md bg-blue-50 text-blue-600 mr-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">{{ $module->name }}</p>
                                <p class="text-sm text-gray-600">{{ $module->code }} • 
                                    @if($module->teacher)
                                        <span class="text-green-600">{{ $module->teacher->name }}</span>
                                    @else
                                        <span class="text-gray-500">No teacher assigned</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <span class="px-2 py-1 text-xs rounded-full {{ $module->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $module->is_available ? 'Available' : 'Unavailable' }}
                        </span>
                    </div>
                    @empty
                    <div class="text-center py-8 text-gray-500">
                        <svg class="w-12 h-12 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="mt-2">No modules yet</p>
                    </div>
                    @endforelse
                </div>
                <div class="mt-4 text-center">
                    <a href="{{ route('admin.modules.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        View all modules →
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 gap-4">
                    
              
                    
                    <a href="{{ route('admin.users.create') }}" 
                       class="group p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors duration-200 flex flex-col items-center justify-center text-center">
                        <div class="p-3 rounded-full bg-purple-100 group-hover:bg-purple-200 mb-3">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.67 3.913a4 4 0 01-5.243-5.243M21 21v-1a6 6 0 00-4-5.659"/>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-800">Add Student</span>
                        <span class="text-sm text-gray-600 mt-1">Enroll new student</span>
                    </a>

                    <!-- Assign Teacher -->
                    <a href="{{ route('admin.modules.index') }}" 
                       class="group p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-colors duration-200 flex flex-col items-center justify-center text-center">
                        <div class="p-3 rounded-full bg-yellow-100 group-hover:bg-yellow-200 mb-3">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-800">Assign Teacher</span>
                        <span class="text-sm text-gray-600 mt-1">To modules</span>
                    </a>
                </div>

                <!-- System Status -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h4 class="font-medium text-gray-800 mb-3">System Status</h4>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Database</span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                                Connected
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Server Load</span>
                            <span class="text-sm font-medium text-gray-800">Normal</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Last Backup</span>
                            <span class="text-sm text-gray-800">{{ now()->subDays(1)->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Teachers -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Recent Teachers</h3>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modules</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse(App\Models\Teacher::withCount('modules')->latest()->take(5)->get() as $teacher)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-800 font-medium">
                                        {{ substr($teacher->name, 0, 2) }}
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-800">{{ $teacher->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-800">{{ $teacher->email }}</td>
                            <td class="px-4 py-3 text-sm text-gray-800">{{ $teacher->phone ?? 'N/A' }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $teacher->modules_count }} modules
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $teacher->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $teacher->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                No teachers found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route('admin.teachers.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    View all teachers →
                </a>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for auto-refresh if needed -->
<script>
    // Auto-refresh stats every 60 seconds
    setInterval(() => {
        // You can add AJAX call here to refresh stats without page reload
        console.log('Auto-refresh stats...');
    }, 60000);
</script>
@endsection