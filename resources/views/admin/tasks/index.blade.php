<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Tasks</h2>

            <a href="{{ route('admin.tasks.create') }}"
               class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                + Create Task
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
                <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Assigned To</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Due Date</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse($tasks as $task)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    {{ $task->title }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $task->assignedUser->name ?? '-' }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4">
                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
                                        {{ str_replace('_', ' ', ucfirst($task->status)) }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-right text-sm">
                                    <a href="{{ route('admin.tasks.edit', $task) }}"
                                       class="font-medium text-indigo-600 hover:text-indigo-800">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.tasks.destroy', $task) }}"
                                          method="POST"
                                          class="ml-3 inline-block"
                                          onsubmit="return confirm('Delete this task?')">
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
                                <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">
                                    No tasks found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>

                @if($tasks->hasPages())
                    <div class="border-t border-gray-100 px-6 py-4">
                        {{ $tasks->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>