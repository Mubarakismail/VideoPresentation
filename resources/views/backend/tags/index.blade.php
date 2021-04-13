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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title ">{{$pageTitle}}</h4>
                            <p class="card-category">{{$pageDes}}</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{route('tags.create')}}" class="btn  btn-white btn-round">
                                Add {{$sModulName}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Control
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}}</td>
                                    <td class="td-actions">
                                        <a href="{{route('tags.edit',['tag'=>$row])}}" rel="tooltip" title=""
                                           class="btn btn-white btn-link btn-sm"
                                           data-original-title="Edit {{$sModulName}}">
                                            <i class="material-icons">
                                                edit
                                            </i>
                                        </a>
                                        <form action="{{route('tags.destroy',['tag'=>$row])}}" method="post">
                                            @csrf
                                            {{method_field('delete')}}
                                            <button type="submit" rel="tooltip" title=""
                                                    class="btn btn-white btn-link btn-sm"
                                                    data-original-title="Remove {{$sModulName}}">
                                                <i class="material-icons">
                                                    close
                                                </i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{$rows->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
