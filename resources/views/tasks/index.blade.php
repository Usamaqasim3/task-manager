<x-app-layout>
    <x-slot name="header">My Tasks</x-slot>

    @include('components.flash')

    <div class="row mb-3">
        <div class="col-md-8">
            <form method="GET" action="{{ route('tasks.index') }}" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search tasks by title..." value="{{ $search ?? '' }}">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ New Task</a>
        </div>
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

        {{ $tasks->withQueryString()->links() }}
    @else
        <p>No tasks found{{ $search ? ' for "' . $search . '"' : '' }}.</p>
    @endif
</x-app-layout>
