@extends('layouts')

	

@section('content')
    <div class="row">
    	<div class="col-lg-6 col-offset-3">
    		<form action="/create/todo" method="post">
    			{{ csrf_field() }}
    			<input type="text" name="todosname" class="form-control input-lg" placeholder="Create Todo">
    			}
    			</div>
    			<div class="col-lg-6">
    		<input type="submit" name="createtodos" class="btn btn-primary">
    	</div>
    		</form>
    	
    	
    </div>
    @foreach($todos as $todo)


    {{$todo->name}} <a href="{{ route('todo.delete',['id'=>$todo->id]) }}" class="btn btn-danger">X</a> <a href="{{ route('todo.edit',['id'=>$todo->id]) }}" class="btn btn-info">Update</a>
    	@if(!$todo->completed)
    		<a href="{{route('todo.complete',['id'=>$todo->id])}}" class="btn btn-success">Mark as Completed</a>
    		@else
    			<span class="text-success">Completed!</span>
    	@endif
    <hr>

    @endforeach
@stop