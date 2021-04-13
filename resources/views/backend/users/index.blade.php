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

    @component('backend.shared.table',['pageDes'=>$pageDes,'pageTitle'=>$pageTitle,
                                        'modeulName'=>$modulName,'sModulName'=>$sModulName,'rows'=>$rows])
        @slot('addButton')
            <div class="col-md-4 text-right">
                <a href="{{route('users.create')}}" class="btn  btn-white btn-round">
                    Add {{$sModulName}}
                </a>
            </div>
        @endslot
    @endcomponent
@endsection
