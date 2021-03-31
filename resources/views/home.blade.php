@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('addFeed') }}" class="btn btn-success float-right">Add Feed</a>
            </div>
        </div>
        @forelse($feedToReturn->channel->item as $feed)
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{$feed->title}}</h3>
                        </div>
                        <div class="card-body card-padding">
                            <div class="row">
                                @if($feedToReturn->channel->image->url)
                                <div class="col-md-3">
                                    <img
                                        src="{{ $feedToReturn->channel->image->url }}"
                                        alt=""
                                    >
                                </div>
                                @endif
                                <div class="@if($feedToReturn->channel->image->url)col-md-9 @else col-md-12 @endif">
                                    <p>{{ strip_tags($feed->description) }}</p>
                                    <a href="{{ $feed->link }}" target="_blank">{{$feed->link}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">No Images To Display.</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection
