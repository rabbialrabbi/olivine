@extends('layouts.master')

@section('title','Home')

@section('content')
    {{--    heading--}}
    <h3>Edit ToDo</h3>

    {{--    Edit TODO form--}}
    <form class="pt-4" method="POST" action="/task/{{$task->id}}">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="col-md-10">
                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">ToDo</div>
                    </div>
                    <input type="text" name="task" class="form-control" id="inlineFormInputGroup"
                           placeholder="Edit Task" value="{{$task->task}}">
                </div>
            </div>
            <div class="col-md-2 text-center">
                <button type="submit" class="btn btn-primary mb-2 px-4">Edit</button>
            </div>
        </div>
        @if($errors->any())
            <div class="error text-danger">
                <p class="pl-4">* {{$errors->first('task')}}</p>
            </div>
        @endif
    </form>

@endsection
