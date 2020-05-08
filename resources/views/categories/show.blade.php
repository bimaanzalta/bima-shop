@extends('layouts.app')
@section('title','Detail Category')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card-box task-detail">
                    <div class="card">
                        <div class="card-body">
                            <label><b>Category name</b></label><br>
                            {{ $category->name }}
                            <br><br>
                            <label><b>Category slug</b></label><br>
                            {{ $category->slug }}
                            <br><br>
                            <label><b>Category image</b></label><br>
                            @if($category->image)
                            <img src="{{asset('storage/' . $category->image)}}" width="120px">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
