@extends('layouts.app')

@section('title', 'View User')
@section('page-title', 'View User - ' . $user->name)

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- User Info Card -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 h-32"></div>
            <div class="px-6 pb-6">
                <div class="flex flex-col items-center -mt-20 mb-6">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&size=120" 
                         class="w-32 h-32 rounded-full border-4 border-white shadow" alt="Avatar">
                    <h2 class="text-2xl font-bold text-gray-900 mt-4">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-600 text-sm">Member Since</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $user->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-600 text-sm">Last Updated</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $user->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-medium text-gray-700">Email Address</label>
                        <p class="text-gray-900 mt-1">{{ $user->email }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">ID</label>
                        <p class="text-gray-600 mt-1">#{{ $user->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Card -->
    <div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.users.edit', $user) }}" 
                   class="block w-full bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                    <i class="fas fa-edit mr-2"></i>Edit User
                </a>
                <button onclick="confirmDelete()" 
                        class="block w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition font-medium">
                    <i class="fas fa-trash mr-2"></i>Delete User
                </button>
                <a href="{{ route('admin.users') }}" 
                   class="block w-full bg-gray-300 text-gray-900 text-center py-2 rounded-lg hover:bg-gray-400 transition font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>Back to List
                </a>
            </div>
        </div>

        <!-- Stats Card -->
        <div class="bg-white rounded-lg shadow p-6 mt-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Activity</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Account Status</span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Form (hidden) -->
<form id="deleteForm" method="POST" action="{{ route('admin.users.delete', $user) }}" style="display:none;">
    @csrf
    @method('DELETE')
</form>

<script>
function confirmDelete() {
    if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
        document.getElementById('deleteForm').submit();
    }
}
</script>
@endsection
