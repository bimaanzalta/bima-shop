@extends('layouts.app')
@section('title', 'Create Category')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form enctype="multipart/form-data" method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Category name</label>
                            <div class="col-10">
                                <input type="text" name="name" class="form-control" placeholder="Category name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Category image</label>
                            <div class="col-10">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
