@extends('layouts.app')

@section('title','Videos')

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2>Latest Videos</h2>
                <p>
                    @if(\request()->has('search')&&\request()->get('search')!='')
                        U are search about <b>{{request()->get('search')}}</b> | <a href="{{route('home')}}">Reset</a>
                    @endif
                </p>
            </div>
            <div class="row">
                @foreach($videos as $video)
                    <div class="col-lg-4">
                        @include('frontend.shared.video_card');
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{$videos->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
