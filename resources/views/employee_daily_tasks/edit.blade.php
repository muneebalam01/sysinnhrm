@extends('layouts.app')

@section('content')
<style>
    a.bg-blue-600.hover\:bg-blue-700.text-white.font-medium.py-2.px-4.rounded {
        background-color: blue;
    }
    button.bg-blue-600.hover\:bg-blue-700.text-white.font-medium.py-2.px-4.rounded {
        background-color: blue !important;
    }
</style>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Edit Daily Task</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employee-daily-tasks.update', $task->id) }}" method="POST" class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    @method('PUT')

        <div class="mb-4">
            <label for="employee_id" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Employee</label>
            <select name="employee_id" id="employee_id" class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" required>
                <option value="">-- Select Employee --</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $task->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="task_date" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Task Date</label>
            <input type="date" name="task_date" id="task_date" value="{{ old('task_date', $task->task_date) }}"
                   class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" required>
        </div>

        <div class="mb-4">
            <label for="task_description" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Task Description</label>
            <textarea name="task_description" id="task_description" rows="4"
                      class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                      required>{{ old('task_description', $task->task_description) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="status" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Status</label>
            <select name="status" id="status"
                    class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white" required>
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
                Update Task
            </button>
            <a href="{{ route('employee-daily-tasks.index') }}"
               class="bg-gray-400 hover:bg-gray-500 text-white font-medium py-2 px-4 rounded">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
