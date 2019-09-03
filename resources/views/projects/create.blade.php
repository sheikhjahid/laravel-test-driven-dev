@extends('layouts.app')

@section('content')
	
<h1> Create a Project </h1>
	
	<form  style="padding: 50px" method="post" action="{{ url('/projects') }}">
		@csrf
		<div class="Title section">
			<label for="Title">Title</label>
			<input type="text" name="title" class="form-control">
		</div>

		<div class="Decsription section">
			<label for="Description">Description</label>
			<textarea name="description" class="form-control"></textarea>
		</div>
		<br>
		<div class="Submit">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="{{ url('projects') }}">Cancel</a>
		</div>
	</form>

@endsection