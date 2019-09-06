@extends('layouts.app')

@section('content')
	
<h1> Edit Your Project </h1>

	@if ( count( $errors ) > 0 )
	@foreach ($errors->all() as $error)
	<div class="alert alert-danger">{{ $error }}</div>
	@endforeach
	@endif
	<form  style="padding: 50px" method="post" action="{{ url('/project',[$project->id]) }}">
		@csrf

		@method('PATCH')

		<div class="Title section">
			<label for="Title">Title</label>
			<input type="text" name="title" value="{{ $project->title }}" class="form-control">
		</div>

		<div class="Decsription section">
			<label for="Description">Description</label>
			<textarea name="description" class="form-control">{{ $project->description }}</textarea>
		</div>

		<div class="Notes section">
			<label for="Notes">Notes</label>
			<textarea name="notes" class="form-control">{{ $project->notes }}</textarea>
		</div>

		<br>
		<div class="Submit">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="{{ url('projects') }}">Cancel</a>
		</div>
	</form>

@endsection