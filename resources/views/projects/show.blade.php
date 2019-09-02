@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="page-header">
                <h2>{{ $project->title }}</h2>
            </div>
            <div class="box">
                {{$project->description}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection