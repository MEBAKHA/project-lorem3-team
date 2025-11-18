@extends('layouts.app')

@section('title', 'My Dashboard')
@section('page-title', 'Welcome Back, ' . auth()->user()->name . '!')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- Profile Card -->
    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Profile</h3>
            <i class="fas fa-user text-blue-600 text-2xl"></i>
        </div>
        <p class="text-gray-600 mb-4">Manage your account information and preferences</p>
        <a href="{{ route('user.profile') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            View Profile <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>

    <!-- Account Status Card -->
    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Account Status</h3>
            <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
        </div>
        <div class="space-y-2">
            <p class="text-gray-600 text-sm">Status: <span class="text-green-600 font-semibold">Active</span></p>
            <p class="text-gray-600 text-sm">Member Since: {{ auth()->user()->created_at->format('M d, Y') }}</p>
        </div>
    </div>

    <!-- Quick Actions Card -->
    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
            <i class="fas fa-lightning-bolt text-yellow-600 text-2xl"></i>
        </div>
        <button onclick="alert('Action Coming Soon')" class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 transition">
            <i class="fas fa-cog mr-2"></i>Settings
        </button>
    </div>
</div>

<!-- Recent Activity -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
    </div>
    <div class="p-6">
        <div class="space-y-4">
            <div class="flex items-center gap-4 pb-4 border-b border-gray-200">
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-login text-blue-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Login Successful</p>
                    <p class="text-sm text-gray-600">Today at {{ now()->format('H:i') }}</p>
                </div>
            </div>
            <div class="flex items-center gap-4 pb-4 border-b border-gray-200">
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-user-check text-green-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Account Created</p>
                    <p class="text-sm text-gray-600">{{ auth()->user()->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
