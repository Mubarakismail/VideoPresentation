@extends('layouts.app')

@section('title','home')


@section('content')
    @include('frontend.home_pageSections.hom_image_section')
    @include('frontend.home_pageSections.videos')
    @include('frontend.home_pageSections.statistics')
    @include('frontend.home_pageSections.contact_us')
@endsection
