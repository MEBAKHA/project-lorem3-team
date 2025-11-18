@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Admin Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Users Card -->
    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Total Users</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalUsers }}</p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <i class="fas fa-users text-blue-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Active Users Card -->
    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Active Users</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $recentUsers->count() }}</p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <i class="fas fa-user-check text-green-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Last Login Card -->
    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Last Activity</p>
                <p class="text-lg font-bold text-gray-900 mt-2">Just now</p>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <i class="fas fa-clock text-purple-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- System Status Card -->
    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">System Status</p>
                <p class="text-lg font-bold text-green-600 mt-2">
                    <i class="fas fa-circle text-green-500 text-xs mr-2"></i>Online
                </p>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
                <i class="fas fa-server text-yellow-600 text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Users -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Recent Users</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Joined</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($recentUsers as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" 
                                     class="w-8 h-8 rounded-full" alt="Avatar">
                                <span class="font-medium text-gray-900">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-gray-600 text-sm">{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 flex gap-2">
                            <a href="{{ route('admin.users.show', $user) }}" class="text-blue-600 hover:text-blue-800 transition">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-yellow-600 hover:text-yellow-800 transition">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-600">No users found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-6 border-t border-gray-200">
        <a href="{{ route('admin.users') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            View all users <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
</div>
@endsection
