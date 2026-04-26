<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Create Task</h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">
                <form action="{{ route('admin.tasks.store') }}" method="POST" class="space-y-5">
                    @csrf

                    @include('admin.tasks.form', [
                        'task' => null,
                        'employees' => $employees,
                        'buttonText' => 'Create Task'
                    ])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>