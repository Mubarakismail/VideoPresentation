@extends('layouts.app')

@section('title',$video->name)s

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2>{{$video->name}}</h2>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @php $url=getYoutubeId($video->youtube) @endphp
                    @if($url)
                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$url}}" title="YouTube video player" allowfullscreen>
                        </iframe>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>{{$video->user->name}}</p>
                    <p>{{$video->created_at}}</p>
                    <p>{{$video->des}}</p>
                    <p>
                        <a href="{{route('front.category',['id'=>$video->category->id])}}">
                            {{$video->category->name}}
                        </a>
                    </p>
                </div>
                <div class="col-md-3">
                    <h3>Tags of this video</h3>
                    <p>
                        @foreach($video->tags as $tag)
                            <a href="{{route('front.skill',['id'=>$tag->id])}}">
                                <span class="badge badge-pill badge-primary">{{$tag->name}}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
                <div class="col-md-3">
                    <h3>Skills of this video</h3>
                    <p>
                        @foreach($video->skills as $skill)
                            <a href="{{route('front.skill',['id'=>$skill->id])}}">
                                <span class="badge badge-pill badge-info">{{$skill->name}}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
