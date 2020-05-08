@extends('layouts.app')
@section('title','Create book')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Create User</h4>
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">Title</label>
                            <div class="col-10">
                                <input id="title" name="title" type="text" class="form-control"
                                    placeholder="Book title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cover" class="col-2 col-form-label">Cover</label>
                            <div class="col-10">
                                <input id="cover" type="file" name="cover" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-2 col-form-label">Description</label>
                            <div class="col-10">
                                <textarea name="description" id="description" class="form-control" rows="5"
                                    placeholder="Give a description about this book"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categories" class="col-2 col-form-label">Categories</label>
                            <div class="col-10">
                                <select name="categories[]" id="categories" class="form-control" multiple></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stock" class="col-2 col-form-label">Stocks</label>
                            <div class="col-10">
                                <input id="stock" name="stock" type="number" class="form-control" min="0" value="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-2 col-form-label">Author</label>
                            <div class="col-10">
                                <input id="author" name="author" type="text" class="form-control"
                                    placeholder="Book author">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="publisher" class="col-2 col-form-label">Publisher</label>
                            <div class="col-10">
                                <input id="publisher" name="publisher" type="text" class="form-control"
                                    placeholder="Book publisher">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-2 col-form-label">Price</label>
                            <div class="col-10">
                                <input id="price" name="price" type="number" class="form-control"
                                    placeholder="Book price">
                            </div>
                        </div>
                        <button class="btn btn-primary" name="save_action" value="PUBLISH">Publish</button>
                        <button class="btn btn-secondary" name="save_action" value="DRAFT">Save as draft</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>

    $('#categories').select2({
            ajax : {
                url : "{{ route('categories.ajax-search') }}",
                processResults : function(data){
                    return {
                        results : data.map(function(item){
                            return {
                                id : item.id,
                                text : item.name
                            }
                        })
                    }
                }
            }
        });
</script>
@endsection
