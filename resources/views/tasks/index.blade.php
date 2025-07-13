<x-app-layout>
    <x-slot name="header">My Tasks</x-slot>

    @include('components.flash')

    <div class="mb-3 text-end">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ New Task</a>
    </div>

    @if ($tasks->count())
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                                <span class="badge bg-{{
                                    $task->status === 'completed' ? 'success' :
                                    ($task->status === 'in_progress' ? 'warning' : 'secondary')
                                }}">
                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                </span>
                        </td>
                        <td>
                            <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this task?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $tasks->links() }}
    @else
        <p>No tasks found. Create one!</p>
    @endif
</x-app-layout>
