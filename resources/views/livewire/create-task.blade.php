<form action="/newtask" method="post">
    @csrf
    @include('flash-message')
    <div class="bgdark">
        <div class="mb-3">
            <label for="tname" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="tname" name="tname" placeholder="Task Name">
        </div>

        <div class="mb-3">
            <label for="priority" class="form-label">Task Priority</label>
            <input type="number" class="form-control" id="priority" name="priority" placeholder="Task Priority">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">

            <button type="submit"class="btn btn-success">Create Task</button>
        </div>
    </div>
</form>
