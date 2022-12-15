<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th>Name</th>
            <th>Priority</th>
            <th>Date</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody wire:sortable="updateTaskOrder">
        @foreach ($tasks as $task)
            <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->priority }}</td>
                <td>{{ $task->created_at->format('l jS M Y g:iA') }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal"
                        data-id="{{ $task->id }}" data-priority="{{ $task->priority }}"
                        data-name="{{ $task->name }}">
                        Edit
                    </button>
                    <a href="/delete/{{ $task->id }}" class="btn btn-danger">Delete</a>
                </td>

            </tr>
        @endforeach

    </tbody>
</table>
