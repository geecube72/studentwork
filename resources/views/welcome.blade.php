@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center py-5" style="background:url({{ asset('img/bg.jpeg') }}) top center;background-size:cover;height:400px">
            <img src="{{ asset('img/logo_clean.png') }}" class="img-fluid mx-auto" alt="">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 my-5">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Input keywords">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" id="button-addon1">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 offset-sm-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold mb-4">Recent Submissions</h5>
                    @foreach($projects as $project)
                        <a href="{{ url("view/{$project->id}") }}" class="d-block mb-1 font-weight-bold" style="font-size:1.2rem">{{ $project->title }}</a>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $project->authors }}</h6>
                        <p class="card-text">
                            {{ str_limit($project->abstract, 250) }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body mt-0">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
