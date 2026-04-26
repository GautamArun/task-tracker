<div>
    <label for="name" class="mb-1 block text-sm font-medium text-gray-700">
        Name
    </label>

    <input type="text"
           id="name"
           name="name"
           value="{{ old('name', $user->name ?? '') }}"
           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

    @error('name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="email" class="mb-1 block text-sm font-medium text-gray-700">
        Email
    </label>

    <input type="email"
           id="email"
           name="email"
           value="{{ old('email', $user->email ?? '') }}"
           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

    @error('email')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="password" class="mb-1 block text-sm font-medium text-gray-700">
        Password
        @if($user)
            <span class="text-xs font-normal text-gray-400">(leave blank to keep current password)</span>
        @endif
    </label>

    <input type="password"
           id="password"
           name="password"
           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

    @error('password')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="password_confirmation" class="mb-1 block text-sm font-medium text-gray-700">
        Confirm Password
    </label>

    <input type="password"
           id="password_confirmation"
           name="password_confirmation"
           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
</div>

<div>
    <label for="role" class="mb-1 block text-sm font-medium text-gray-700">
        Role
    </label>

    <select id="role"
            name="role"
            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        <option value="">Select role</option>
        <option value="admin" @selected(old('role', $user->role ?? '') === 'admin')>
            Admin
        </option>
        <option value="employee" @selected(old('role', $user->role ?? '') === 'employee')>
            Employee
        </option>
    </select>

    @error('role')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="flex items-center justify-end gap-3 border-t pt-5">
    <a href="{{ route('admin.users.index') }}"
       class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
        Cancel
    </a>

    <button type="submit"
            class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>