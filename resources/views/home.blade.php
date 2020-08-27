@extends('layouts.master')

@section('title','Home')

@section('content')
{{--    heading--}}
    <h3>ToDo Task</h3>

    {{--    Add TODO form--}}
    <form class="pt-4" method="POST" action="/task">
        @csrf
        <div class="form-row">
            <div class="col-md-10">
                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">ToDo</div>
                    </div>
                    <input type="text" name="task" class="form-control" id="inlineFormInputGroup" placeholder="Task" style="height: 50px">
                </div>
            </div>
            <div class="col-md-2 text-center">
                <button type="submit" class="btn btn-primary mb-2 px-4 mt-1" style="height: 40px">Add</button>
            </div>
        </div>
        @if($errors->any())
            <div class="error text-danger">
                <p class="pl-4">* {{$errors->first('task')}}</p>
            </div>
        @endif

    </form>


    <div class="todo-active">
        <h4 class="pt-5">Task Todo</h4>
        <div class="list-group pt-3">
            <ul class="list-group">
                @foreach($tasks as $t)
                    @if($t->status)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-12 col-md-10"><del>{{$t->task}}</del></div>
                                <div class="col-sm-12 col-md-2">
                                    <a class="btn btn-info py-1" style="width: 70px" href="{{route('task.undo',['task'=>$t->id])}}">Undo</a>
                                    <a class="btn btn-danger py-1" style="width: 70px" onclick="event.preventDefault();
                                document.getElementById('delete-form').submit();">Delete</a>
                                    <form id="delete-form" action="{{ route('task.delete',['task'=>$t->id]) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </div>
                        </li>
                        @else
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-12 col-md-10">{{$t->task}}</div>
                                <div class="col-sm-12 col-md-2">
                                    <a class="btn btn-info py-1" style="width: 70px" href="{{route('task.edit',['task'=>$t->id])}}">Edit</a>
                                    <a class="btn btn-danger py-1" style="width: 70px" href="{{route('task.done',['task'=>$t->id])}}">Delete</a>
                                </div>
                            </div>
                        </li>
                        @endif

                    @endforeach
            </ul>
        </div>
    </div>
    @endsection
