@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="p-6">
            <div class="content">

                <div class="card mt-4 mb-4 bgdark">
                    <div class="card-header text-center">
                        <h3>Create New Task</h3>
                    </div>

                    <div class="card-body">
                        @livewire('create-task')

                    </div>


                </div>


                <div class="card mt-4 bgdark">
                    <div class="header-text text-center mt-4 ">
                        <h3> All Tasks</h3>
                    </div>

                    @include('flash-message')
                    @livewire('task-table')

                </div>


                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">


                                <form action="/edittask" method="post" name='myForm'>
                                    @csrf
                                    @include('flash-message')
                                    <input type="hidden" name="id" class="modal-text" value="">
                                    <div class="mb-3">
                                        <label for="tname" class="form-label">Task Name</label>
                                        <input type="text" class="form-control" id="tname" name="tname"
                                            value="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="priority" class="form-label">Task Priority</label>
                                        <input type="number" class="form-control" id="priority" name="priority"
                                            placeholder="Task Priority">
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        @endsection
