@extends("layouts.app")
@section("title",'Edit User')
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Edit Book</h4>
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md 8">
                            <form action="{{ route('books.update',$book->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group row">
                                    <label for="title" class="col-2 col-form-label">Title</label>
                                    <div class="col-10">
                                        <input id="title" name="title" value="{{ $book->title }}" type="text"
                                            class="form-control" placeholder="Book title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cover" class="col-2 col-form-label">Current Cover</label>
                                    <div class="col-10">
                                        @if ($book->cover)
                                        <img src="{{ asset('storage/'.$book->cover) }}" width="200">
                                        @endif
                                        <input id="cover" type="file" name="cover" class="form-control">
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-2 col-form-label">Slug</label>
                                    <div class="col-10">
                                        <input id="title" disabled name="title" value="{{ $book->slug }}" type="text"
                                            class="form-control" placeholder="Book title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-2 col-form-label">Description</label>
                                    <div class="col-10">
                                        <textarea name="description" id="description" class="form-control" rows="5"
                                            placeholder="Give a description about this book">{{ $book->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="categories" class="col-2 col-form-label">Categories</label>
                                    <div class="col-10">
                                        <select name="categories[]" id="categories" class="form-control"
                                            multiple></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stock" class="col-2 col-form-label">Stocks</label>
                                    <div class="col-10">
                                        <input id="stock" value="{{ $book->stock }}" name="stock" type="number"
                                            class="form-control" min="0" value="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="author" class="col-2 col-form-label">Author</label>
                                    <div class="col-10">
                                        <input id="author" value="{{ $book->author }}" name="author" type="text"
                                            class="form-control" placeholder="Book author">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="publisher" class="col-2 col-form-label">Publisher</label>
                                    <div class="col-10">
                                        <input id="publisher" value="{{ $book->publisher }}" name="publisher"
                                            type="text" class="form-control" placeholder="Book publisher">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-2 col-form-label">Price</label>
                                    <div class="col-10">
                                        <input id="price" value="{{ $book->price }}" name="price" type="number"
                                            class="form-control" placeholder="Book price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-2 col-form-label">Status</label>
                                    <div class="col-10">
                                        <select name="status" id="status" class="form-control">
                                            <option {{ $book->status == 'PUBLISH' ? 'selected' : '' }} value="PUBLISH">
                                                PUBLISH</option>
                                            <option {{ $book->status == 'DRAFT' ? 'selected' : '' }} value="DRAFT">DRAFT
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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

var categories = {!! $book->categories !!}
console.table(categories)
categories.forEach(category => {
    var option = new Option(category.name, category.id,true,true)
    $('#categories').append(option).trigger('change');
});

</script>
@endsection
