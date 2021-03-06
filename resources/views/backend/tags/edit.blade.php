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
                    <form action="{{route('tags.update',['tag'=>$row->id])}}" method="post">
                        {{method_field('put')}}
                        @include('backend.tags.form')
                        <button type="submit" class="btn btn-primary pull-right">Update {{$modulName}}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
