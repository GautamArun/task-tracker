<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Users</h2>

            <a href="{{ route('admin.users.create') }}"
               class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                + Create User
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 rounded-lg bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Role</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse($users as $user)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    {{ $user->name }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $user->email }}
                                </td>

                                <td class="px-6 py-4">
                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium capitalize text-gray-700">
                                        {{ $user->role }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-right text-sm">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                       class="font-medium text-indigo-600 hover:text-indigo-800">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.users.destroy', $user) }}"
                                          method="POST"
                                          class="ml-3 inline-block"
                                          onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="font-medium text-red-600 hover:text-red-800">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-sm text-gray-500">
                                    No users found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if($users->hasPages())
                    <div class="border-t border-gray-100 px-6 py-4">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>