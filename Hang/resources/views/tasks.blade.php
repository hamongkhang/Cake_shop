@extends('layouts.app')

@section('content')
    <div class="panel-body" style="margin-bottom: 30px">
        <form action="{{ route('store.task') }}" method="POST" class="form-horizontal">
        @csrf
            <div class="card">
                <h5 class="card-header">
                    New Task
                </h5>
                <div class="card-body row">
                    <label class="col-sm-2" for="task-name"><b>Task</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Enter task..." name="name">
                    </div>
                    <!-- Add Task Button -->
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Add Task
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @if (count($tasks) > 0)
        <div class="card">
            <h5 class="card-header">
                    Current Tasks
            </h5>
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <!-- Table Headings -->
                            <thead>
                                <th>Task</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                    </td>
                                    <td>
                                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection