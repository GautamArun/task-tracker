<div>
    <label class="mb-1 block text-sm font-medium text-gray-700">Title</label>

    <input type="text"
           name="title"
           value="{{ old('title', $task->title ?? '') }}"
           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

    @error('title')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="mb-1 block text-sm font-medium text-gray-700">Description</label>

    <textarea name="description"
              rows="4"
              class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $task->description ?? '') }}</textarea>

    @error('description')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="mb-1 block text-sm font-medium text-gray-700">Assign Employee</label>

    <select name="assigned_user_id"
            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        <option value="">Select Employee</option>

        @foreach($employees as $employee)
            <option value="{{ $employee->id }}"
                @selected(old('assigned_user_id', $task->assigned_user_id ?? '') == $employee->id)>
                {{ $employee->name }}
            </option>
        @endforeach
    </select>

    @error('assigned_user_id')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="mb-1 block text-sm font-medium text-gray-700">Due Date</label>

    <input type="date"
           name="due_date"
           value="{{ old('due_date', $task->due_date ?? '') }}"
           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

    @error('due_date')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="mb-1 block text-sm font-medium text-gray-700">Status</label>

    <select name="status"
            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        <option value="pending" @selected(old('status', $task->status ?? '') === 'pending')>Pending</option>
        <option value="in_progress" @selected(old('status', $task->status ?? '') === 'in_progress')>In Progress</option>
        <option value="completed" @selected(old('status', $task->status ?? '') === 'completed')>Completed</option>
    </select>

    @error('status')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="flex items-center justify-end gap-3 border-t pt-5">
    <a href="{{ route('admin.tasks.index') }}"
       class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
        Cancel
    </a>

    <button type="submit"
            class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>