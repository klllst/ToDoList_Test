@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    <div class="card-header">{{__('New Task')}}</div>
                    <div class="card-body">
                        <!-- New Task Form -->
                        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <!-- Task Name -->
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Task</label>

                                <div class="col-sm-6">
                                    <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                                </div>
                            </div>

                            <!-- Add Task Button -->
                            <div class="form-group mt-3">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-btn"></i>Add Task
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Current Tasks -->
                @if (count($tasks) > 0)
                    <div class="card mt-4">
                        <div class="card-header">{{__('Tasks')}}</div>

                        <div class="card-body">
                            <table class="table table-striped task-table">
                                <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{url('task/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
@endsection
