@extends('backend.layouts.app')

@section('title')
    {{$pageTitle}}
@endsection

@section('content')

    @component('backend.layouts.header')
        @slot('nav_title')
            {{$pageTitle}}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$pageTitle}}</h4>
                    <p class="card-category">{{$pageDes}}</p>
                </div>
                <div class="card-body">
                    <form action="{{route('videos.update',['video'=>$row->id])}}" method="post" enctype="multipart/form-data">
                        {{method_field('put')}}
                        @include('backend.videos.form')
                        <button type="submit" class="btn btn-primary pull-right">Update {{$sModelName}}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                @php $url=getYoutubeId($row->youtube) @endphp
                @if($url)
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$url}}" title="YouTube video player" allowfullscreen>
                    </iframe>
                @endif
                <img src="{{url('uploads'.$row->image)}}" width="100%">
            </div>
        </div>
    </div>

@endsection
