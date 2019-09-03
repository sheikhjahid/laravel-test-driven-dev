@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header" style="display: flex;">

                    <h2>My Projects</h2>
                    
                    <a class="btn btn-primary create-projects" href="{{ url('/projects/create') }}">Create Project</a>
                </div>

                <div class="row">
                @foreach($projects as $project)
                <div class="column">

                    <div class="card box bg-white shadow">
                        <a href="{{url($project->path())}}" style="text-decoration: none">
                        <h3 class="project-title">{{ $project->title }}</h3></a>
                        <div style="color:grey;">{{ str_limit($project->description, 40) }}</div>
                    </div>
                </div>
                @endforeach
                 </div>
            </div>
        </div>
    </div>
@endsection