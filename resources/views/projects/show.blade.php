@extends('layouts.app')

@section('content')

<h2> <a style="text-decoration: none; color:grey;" href="{{ url('projects') }}">My Projects</a> / {{ $project->title }}</h2>


<div class="container">
    <h2 style="margin-bottom: 20px;"> Tasks</h2>
     <div style="padding-left: 84% !important;">
       <div class="card box bg-white">
        <h2 class="project-title">{{ $project->title }}</h2>
        <div style="color:grey;">{{ str_limit($project->description, 40) }}</div>
        </div>
    </div>  
    @if($project->tasks->count() > 0)
    @foreach($project->tasks as $tasks)
    <div style="margin-top:-154px;margin-bottom: 10px; margin-right: 200px" class="card box bg-white shadow">
        {{ $tasks->body }}
    </div>
    @endforeach
    @else
    <h2> No Tasks </h2>  
    @endif
    <div> 
     <h2 style="margin-top:20px"> General Notes </h2>
     <textarea style="display: flex;" class="card-project-description"> Random text </textarea>
    </div>
</div>


@endsection