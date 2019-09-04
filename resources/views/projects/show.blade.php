@extends('layouts.app')

@section('content')

<h2> <a style="text-decoration: none; color:grey;" href="{{ url('projects') }}">My Projects</a> / {{ $project->title }}</h2>


<div class="container">
    <h2 style="margin-bottom: 20px;"> Tasks</h2>
     <div style="padding-left: 84% !important;">
       <div class="project-card box bg-white">
        <h2 class="project-title">{{ $project->title }}</h2>
        <div style="color:grey;">{{ str_limit($project->description, 40) }}</div>
        </div>
    </div>  
    <div style="margin-top: -165px;" class="task-section">
    @foreach($project->tasks as $tasks)
    
    <div class="task-card box bg-white shadow">
        <form method="POST" action="{{ url($tasks->path()) }}">
           @csrf
           @method('PATCH') 
           <div style="display: flex;">
           @if($tasks->completed == 1) 
          <input class="form-control mr-3 " name="body" value="{{ $tasks->body }}" disabled>
          <input value="{{ $tasks->body }}" name="body" hidden>
          @else
          <input class="form-control mr-3 " name="body" value="{{ $tasks->body }}">
          @endif
          <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $tasks->completed ? 'checked':'' }}>
            </div>
        </form>
    </div>
    @endforeach
    <div class="task-card box bg-white shadow">
        <form method="POST" action="{{ url($project->path().'/tasks') }}">
          @csrf  
        <input type="text" class="form-control" name="body" placeholder="Add a task...">
        </form>
    </div>
    </div>
    <div> 
     <h2 style="margin-top:20px"> General Notes </h2>
     <form method="POST" action="{{ url($project->path()) }}">
      @csrf
      @method('PATCH')
     <textarea style="margin-bottom: 20px; padding-left: 20px; width:81%; height:162px" name="notes" class="form-control">{{ $project->notes }}</textarea>
     <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>
</div>


@endsection