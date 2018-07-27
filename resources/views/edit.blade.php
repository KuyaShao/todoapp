@extends('layouts')

@section('content')
    <div class="row">
    	<div class="col-lg-12">
    		<form action="{{ route('todo.update',['id'=>$todos->id]) }}" method="post">
    			{{ csrf_field() }}
    			<input type="text" name="updatetodos" class="form-control input-lg" placeholder="Create Todo" value="{{$todos->name}}">
    			
    		
    		</form>
                </div>
    </div>

@stop