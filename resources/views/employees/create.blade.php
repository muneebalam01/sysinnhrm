@extends('layouts.app')
<style>
    a.bg-blue-600.hover\:bg-blue-700.text-white.font-medium.py-2.px-4.rounded {
    background-color: blue;
}
button.bg-blue-600.hover\:bg-blue-700.text-white.font-medium.py-2.px-4.rounded {
    background-color: blue!important;
}
</style>
@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Add New Employee</h2>

        <form action="{{ route('employees.store') }}" method="POST" class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="first_name" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">First Name</label>
                <input type="text" id="first_name" name="first_name"
                       value="{{ old('first_name') }}"
                       class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-300"
                       required>
                @error('first_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Last Name</label>
                <input type="text" id="last_name" name="last_name"
                       value="{{ old('last_name') }}"
                       class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-300"
                       required>
                @error('last_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email"
                       value="{{ old('email') }}"
                       class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-300"
                       required>
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-300"
                    required>
                @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Phone</label>
                <input type="text" id="phone" name="phone"
                       value="{{ old('phone') }}"
                       class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-300">
                @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="position" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Position</label>
                <input type="text" id="position" name="position"
                       value="{{ old('position') }}"
                       class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-300">
                @error('position') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="salary" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Salary</label>
                <input type="number" step="0.01" id="salary" name="salary"
                       value="{{ old('salary') }}"
                       class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-300">
                @error('salary') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="hired_at" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Hire Date</label>
                <input type="date" id="hired_at" name="hired_at"
                       value="{{ old('hired_at') }}"
                       class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-300">
                @error('hired_at') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Optional: Department dropdown --}}
            {{--
            <div class="mb-4">
                <label for="department_id" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Department</label>
                <select id="department_id" name="department_id"
                        class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">Select department</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            --}}

            <div class="flex items-center justify-between mt-6">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
                    Save Employee
                </button>
                <a href="{{ route('employees.index') }}"
                   class="text-gray-600 dark:text-gray-300 hover:underline">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
