@extends('layouts.app')

@section('title',$skill->name)s

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2>{{$skill->name}}</h2>
            </div>
            @include('frontend.shared.video_row')
        </div>
    </div>
@endsection
