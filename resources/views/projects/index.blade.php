@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header">
                    <h2>All Projects</h2>
                </div>
                @foreach($projects as $project)
                <br>
                <div class="card">
                    <div class="card-header"><a href="{{ url($project->path()) }}">{{$project->title}}</a></div>

                    <div class="card-body">
                        {{$project->description}}
                    </div>
                </div>
                @endforeach   
            </div>
        </div>
    </div>
@endsection