@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header" style="display: flex;">

                    <h2 style="margin:right;">All Projects</h2>
                    
                    <a style="margin:auto;" href="{{ url('/projects/create') }}">Create Project</a>
                </div>

                <div style="display: flex;">
                @foreach($projects as $project)
                <div class="bg-white mr-3 shadow" style="border-radius:41px;width:33.33%;padding:2rem !important;">
                    <h3 style="margin-bottom:20px;font-size:normal;"><a href="{{url('project',[$project->id])}}">{{ $project->title }}</a></h3>
                    <div style="color:grey;">{{ str_limit($project->description, 40) }}</div>
                </div>
                @endforeach
                 </div>
            </div>
        </div>
    </div>
@endsection