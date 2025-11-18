@extends('layouts.app')

@section('title', 'Manage Users')
@section('page-title', 'Manage Users')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-900">Users List</h3>
        <div class="flex gap-3">
            <input type="text" placeholder="Search users..." class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus mr-2"></i>Add User
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Joined Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm text-gray-600">#{{ $user->id }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" 
                                     class="w-8 h-8 rounded-full" alt="Avatar">
                                <span class="font-medium text-gray-900">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-gray-600 text-sm">{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <i class="fas fa-circle text-xs mr-2"></i>Active
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('admin.users.show', $user) }}" 
                                   class="text-blue-600 hover:text-blue-800 hover:bg-blue-50 p-2 rounded transition"
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.users.edit', $user) }}" 
                                   class="text-yellow-600 hover:text-yellow-800 hover:bg-yellow-50 p-2 rounded transition"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="confirmDelete({{ $user->id }})" 
                                        class="text-red-600 hover:text-red-800 hover:bg-red-50 p-2 rounded transition"
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <i class="fas fa-inbox text-4xl text-gray-300 mb-4"></i>
                            <p class="text-gray-600">No users found</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($users->hasPages())
        <div class="p-6 border-t border-gray-200">
            <div class="flex justify-center">
                {{ $users->links('pagination::tailwind') }}
            </div>
        </div>
    @endif
</div>

<!-- Delete Form (hidden) -->
<form id="deleteForm" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

<script>
function confirmDelete(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
        document.getElementById('deleteForm').action = `{{ route('admin.users.delete', '') }}/${userId}`;
        document.getElementById('deleteForm').submit();
    }
}
</script>
@endsection
