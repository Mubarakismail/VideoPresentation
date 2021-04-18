@extends('layouts.app')

@section('title',$page->name)

@section('content')
    <div class="section section-buttons text-center" style="min-height: 600px;">
        <div class="container">
            <div class="title">
                <h2>{{$page->name}}</h2>
            </div>
            <p>{{$page->des}}</p>
        </div>
    </div>
@endsection
