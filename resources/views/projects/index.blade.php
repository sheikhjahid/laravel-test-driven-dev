@extends('layouts.app')

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 2rem !important;
  text-align: center;
  background-color: #f1f1f1;
  border-radius: 1.25rem;
}
.column {
  float: left;
  width: 50%;
  padding: 10px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header" style="display: flex;">

                    <h2 style="color:grey;font-size:20px;margin:left;">My Projects</h2>
                    
                    <a style="text-decoration:none;color:grey;margin:auto;" href="{{ url('/projects/create') }}">Create Project</a>
                </div>

                <div class="row">
                @foreach($projects as $project)
                <div class="column">

                    <div class="card box bg-white shadow">
                        <h3 style="margin-bottom:20px;font-size:normal;"><a href="{{url('project',[$project->id])}}">{{ $project->title }}</a></h3>
                        <div style="color:grey;">{{ str_limit($project->description, 40) }}</div>
                    </div>
                </div>
                @endforeach
                 </div>
            </div>
        </div>
    </div>
@endsection