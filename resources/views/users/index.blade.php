@extends('layouts.app')
@section('title','User List')
@section('content')
<div class="content">
    <div class="container-fluild">
        <div class="row">
            <div class="col-8">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Users</h4>
                    <div class="d-flex row flex-row-reverse mb-4">
                        <div class="col-2">
                            <a href="{{ route('users.create') }}"
                                class="btn btn-primary waves-light waves-effect">Create users</a>
                        </div>
                    </div>
                    <form action="{{ route('users.index') }}">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Search</label>
                            <div class="col-6">
                                <input value="{{ Request::get('keyword') }}" class="form-control" type="search"
                                    name="keyword" placeholder="Filter berdasarkan email">
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-radio">
                                    <input {{ Request::get('status') == 'ACTIVE' ? 'checked' : '' }} type="radio"
                                        value="ACTIVE" name="status" id="active" class="custom-control-input">
                                    <label class="custom-control-label" for="active">Active</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input {{ Request::get('status') == 'INACTIVE' ? 'checked' : '' }} type="radio"
                                        value="INACTIVE" name="status" id="inactive" class="custom-control-input">
                                    <label class="custom-control-label" for="inactive">Inactive</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-secondary waves-light waves-effect">Search</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Avatar</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>@if ($user->avatar)
                                    <img src="{{ asset('storage/'.$user->avatar) }}" width="100">
                                    @else
                                    N/A
                                    @endif</td>
                                <td>
                                    @if ($user->status == 'ACTIVE')
                                    <span class="badge badge-success">{{ $user->status }}</span>
                                    @else
                                    <span class="badge badge-danger">{{ $user->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);"
                                            class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                            data-toggle="dropdown" aria-expanded="false"><i
                                                class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('users.show',$user->id) }}"><i
                                                    class="mdi mdi-details mr-2 font-18 text-muted vertical-middle"></i>Detail</a>
                                            <a class="dropdown-item" href="{{ route('users.edit',$user->id) }}"><i
                                                    class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                            <form id="sa-warning" class="d-inline"
                                                action="{{route('users.destroy', $user->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="dropdown-item" href="#"><i
                                                        class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                                Showing {{ $users->count() }} to {{ $users->perPage() }} of {{ $users->total() }}
                                entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            {{ $users->appends(Request::all())->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
