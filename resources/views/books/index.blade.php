@extends('layouts.app')
@section('title','Books list')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card-box">
                    @if(session('status'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                {{session('status')}}
                            </div>
                        </div>
                    </div>
                    @endif
                    <h4 class="m-t-0 header-title">Categories</h4>
                    <div class="d-flex row flex-row mb-4">
                        <div class="col-12">
                            <a href="{{ route('books.create') }}"
                                class="btn btn-primary waves-light waves-effect">Create
                                book</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <form action="{{ route('categories.index') }}">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Search</label>
                                    <div class="col-6">
                                        <input class="form-control" type="search" name="name"
                                            value="{{ Request::get('name') }}" placeholder="Filter by category name">
                                    </div>
                                    <div class="col-2">
                                        <button type="submit"
                                            class="btn btn-secondary waves-light waves-effect">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-4">
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="
                                    {{ route('categories.index') }}">Published</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="
                                    {{ route('categories.trash') }}">Trash</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Categories</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($books as $book)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td class="text-center">
                                    @if ($book->cover)
                                    <img src={{ asset('storage/'.$book->cover) }} width="200">
                                    @else
                                    No Image
                                    @endif
                                </td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>
                                    @if ($book->status == "DRAFT")
                                    <span class="badge badge-secondary">{{ $book->status }}</span>
                                    @else
                                    <span class="badge badge-success">{{ $book->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="pl-3">
                                        @foreach ($book->categories as $category)
                                        <li>{{ $category->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    {{ $book->stock }}
                                </td>
                                <td>
                                    {{ $book->price }}
                                </td>
                                <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);"
                                            class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                            data-toggle="dropdown" aria-expanded="false"><i
                                                class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('books.show',$book->id) }}"><i
                                                    class="mdi mdi-details mr-2 font-18 text-muted vertical-middle"></i>Detail</a>
                                            <a class="dropdown-item" href="{{ route('books.edit',$book->id) }}"><i
                                                    class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                            <form id="sa-warning" class="d-inline"
                                                action="{{route('books.destroy', $book->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="dropdown-item" href="#"><i
                                                        class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>move
                                                    to trash</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
