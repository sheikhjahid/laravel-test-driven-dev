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
    <div style="margin-top:-154px;margin-bottom: 10px; margin-right: 200px" class="card box bg-white shadow">
        Tasks 1
    </div>
    <div style="margin-bottom: 10px;margin-right: 200px" class="card box bg-white shadow">
        Tasks 2
    </div>
    <div style="margin-bottom: 10px;margin-right: 200px" class="card box bg-white shadow">
        Tasks 3
    </div>
    <div style="margin-right: 200px;margin-bottom: : 30px" class="card box bg-white shadow">
        Tasks 4
    </div>
    <div> 
     <h2 style="margin-top:20px"> General Notes </h2>
     <textarea style="display: flex;" class="card-project-description"> Random text </textarea>
    </div>
</div>


@endsection