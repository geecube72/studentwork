@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-titletext-uppercase mb-4">Add new project record</h5>
                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ url('projects') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">D.O.I</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="doi" value="{{ old('doi') }}" placeholder="Digital Optional Identifier (optional)">
                                <span class="form-text text-muted">ie. 10.1145/278446.2383605</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Project Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Author(s)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="authors" value="{{ old('authors') }}" placeholder="Enter Author(s) Full Name">
                                <span class="form-text text-muted">Separate each name by commas. (Jose Rizal, Rodrigo Duterte, John Doe)</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Abstract</label>
                            <div class="col-sm-10">
                                <textarea name="abstract" id="abstract" rows="5" class="form-control">{{ old('abstract') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Adviser</label>
                            <div class="col-sm-10">
                                <select name="adviser_id" class="form-control select2">
                                    <option disabled selected>SELECT YOUR ADVISER</option>
                                    @foreach($faculty AS $adviser)
                                        <option value="{{ $adviser->id }}" {{ old('adviser_id') == $adviser->id ? 'selected="selected"' : '' }}>{{ $adviser->fullname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label">Area</label>
                                    <div class="col-sm-6">
                                        <select name="area_id" class="form-control select2">
                                            <option disabled selected>SELECT AN AREA</option>
                                            @foreach($areas AS $area)
                                                <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected="selected"' : '' }}>{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @if(!Auth::user()->isRole(\App\User::USER_TYPE_STUDENT))
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Call #</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="call_number" value="{{ old('call_numberr') }}" placeholder="Enter Call Number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Date Submitted</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="date_submitted" value="{{ old('date_submitted') }}">
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Panel</label>
                            <div class="col-sm-10">
                                <select name="panel_ids[]" class="form-control select2" multiple data-maximum-selection-length="3" data-allow-clear="true">
                                    <option disabled>SELECT YOUR PANEL</option>
                                    @foreach($faculty AS $panel)
                                        <option value="{{ $panel->id }}" {{ in_array($panel->id, (array)old('panel_ids')) ? 'selected="selected"' : '' }}>{{ $panel->fullname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keyword(s)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="keywords" value="{{ old('keywords') }}" placeholder="Title">
                                <span class="form-text text-muted">Separate each words by commas. (management, digital repository, archiving)</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label">Page(s)</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="pages" value="{{ old('pages') }}" placeholder="No. of page(s)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Year Published</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="year_published" value="{{ old('year_published') }}" placeholder="Year">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Upload file</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="file" value="{{ old('date_submitted') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-success btn-lg px-5">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
