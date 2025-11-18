@extends('layouts.app')

@section('title', 'My Profile')
@section('page-title', 'My Profile')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Edit Profile</h3>
            </div>

            <form method="POST" action="{{ route('user.profile.update') }}" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-6 border-t border-gray-200">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                        <i class="fas fa-save mr-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Security Section -->
        <div class="bg-white rounded-lg shadow overflow-hidden mt-6">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Security</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                    <div>
                        <p class="font-medium text-gray-900">Password</p>
                        <p class="text-sm text-gray-600">Last changed: Never</p>
                    </div>
                    <button class="text-blue-600 hover:text-blue-800 font-medium">Change</button>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium text-gray-900">Two-Factor Authentication</p>
                        <p class="text-sm text-gray-600">Not enabled</p>
                    </div>
                    <button class="text-blue-600 hover:text-blue-800 font-medium">Enable</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Info -->
    <div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex flex-col items-center text-center">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=random&size=120" 
                     class="w-24 h-24 rounded-full border-4 border-blue-200" alt="Avatar">
                <h2 class="text-xl font-bold text-gray-900 mt-4">{{ auth()->user()->name }}</h2>
                <p class="text-gray-600">{{ auth()->user()->email }}</p>
                <div class="mt-4 inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm font-medium">
                    <i class="fas fa-circle text-xs mr-2"></i>Active
                </div>
            </div>

            <div class="mt-6 pt-6 border-t border-gray-200 space-y-4">
                <div>
                    <p class="text-sm text-gray-600">User ID</p>
                    <p class="font-semibold text-gray-900">#{{ auth()->user()->id }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Member Since</p>
                    <p class="font-semibold text-gray-900">{{ auth()->user()->created_at->format('M d, Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Last Updated</p>
                    <p class="font-semibold text-gray-900">{{ auth()->user()->updated_at->format('M d, Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Account Options -->
        <div class="bg-white rounded-lg shadow p-6 mt-6">
            <h3 class="font-semibold text-gray-900 mb-4">Account Options</h3>
            <button class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 rounded transition">
                <i class="fas fa-sign-out-alt mr-2"></i>Sign Out
            </button>
        </div>
    </div>
</div>
@endsection
