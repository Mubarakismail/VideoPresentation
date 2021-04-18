<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title ">{{$pageTitle}}</h4>
                        <p class="card-category">{{$pageDes}}</p>
                    </div>
                    {{$addButton}}
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
                                Email
                            </th>
                            <th>
                                Group
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
                                <td>{{$row->email}}</td>
                                <td>{{$row->group}}</td>
                                <td class="td-actions">
                                    <a href="{{route('users.edit',['user'=>$row->id])}}" rel="tooltip" title=""
                                       class="btn btn-white btn-link btn-sm"
                                       data-original-title="Edit {{$sModulName}}">
                                        <i class="material-icons">
                                            edit
                                        </i>
                                    </a>
                                    <form action="{{route('users.destroy',['user'=>$row->id])}}" method="post">
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
