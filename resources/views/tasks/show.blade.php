<x-app-layout>
    <x-slot name="header">Task Details</x-slot>

    <div class="card p-4 shadow-sm">
        <h4 class="card-title mb-3">{{ $task->title }}</h4>

        <p><strong>Description:</strong><br>{{ $task->description ?? 'N/A' }}</p>
        <p><strong>Due Date:</strong> {{ $task->due_date }}</p>
        <p><strong>Status:</strong>
            <span class="badge bg-{{
                $task->status === 'completed' ? 'success' :
                ($task->status === 'in_progress' ? 'warning' : 'secondary')
            }}">
                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
            </span>
        </p>

        <div class="mt-4">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button onclick="return confirm('Delete this task?')" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</x-app-layout>
