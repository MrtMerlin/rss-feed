@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ url()->previous() }}" class="btn btn-primary float-right">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        See Rss Feed
                    </div>
                    <div class="card-body card-padding">
                        <form action="{{ route('feed') }}" method="post">
                            @csrf
                            <div class="row ">
                                <div class="col-md-2">
                                    <label for="feed">Add Feed</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="feed" name="feed" placeholder="Please enter rss feed address." value="{{ old('feed') }}"/>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
