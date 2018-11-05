@extends('admin.layouts.app')
@section('content')
    @if(session('attach'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Success</span>
            You successfully add  {{session('attach')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('delete'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Success</span>
            You successfully {{session('delete')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('admin.users')}}">Users</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">All Users</strong>
                        </div>
                        <div class="card-body">
                            <table id="teachers" class="table table-striped table-bordered">
                                <thead>

                                <tr>
                                    <th scope="col"> Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Article</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>

                                        <td>{{ $user->email  }}</td>
                                        <td>
                                            <a href="{{route('admin.users.delete',$user->id)}}" class="btn btn-danger btn-xs" >Delete</a>
                                            <a href="{{route('admin.users.add_cars',$user->id)}}" class="btn btn-primary btn-xs" >Add Cars</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection