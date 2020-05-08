@extends("layouts.app")
@section("title",'Edit User')
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Edit Category</h4>
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md 8">
                            <form action="{{ route('categories.update',$category->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Category name</label>
                                    <div class="col-10">
                                        <input type="text" value="{{ $category->name }}" name="name"
                                            class="form-control" placeholder="Category name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Category slug</label>
                                    <div class="col-10">
                                        <input type="text" disabled  value="{{ $category->slug }}" name="slug" class="form-control" placeholder="Category name">
                                    </div>
                                </div>
                                @if ($category->image)
                                <div class="row form-group">
                                    <label class="col-2 col-form-label">Current image</label>
                                    <img src="{{ asset('storage/'.$category->image) }}" width="200" alt="" srcset="">
                                </div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Category image</label>
                                    <div class="col-10">
                                        <input type="file" name="image" class="form-control">
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!-- end row -->
                </div> <!-- end card-box -->
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container -->

</div>
@endsection
