@extends("layouts.app")
@section("title",'Create User')
@section("content")
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
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <form class="form-horizontal" enctype="multipart/form-data" role="form"
                                    action="{{route('users.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="name">Name</label>
                                        <div class="col-10">
                                            <input name="name" type="text" id="name" class="form-control"
                                                value="Some text value...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="username">Username</label>
                                        <div class="col-10">
                                            <input name="username" type="text" id="username" class="form-control"
                                                value="Some text value...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="header-title">Roles</h4>
                                            <div class="mt-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="roles[]" value="ADMIN"
                                                        class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">ADMIN</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="roles[]" value="STAFF"
                                                        class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">STAFF</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="roles[]" value="CUSTOMER"
                                                        class="custom-control-input" id="customCheck3">
                                                    <label class="custom-control-label"
                                                        for="customCheck3">CUSTOMER</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="address">Address</label>
                                        <div class="col-10">
                                            <textarea name="address" id="address" class="form-control"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="phone">Number</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="phone" type="number" name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Avatar</label>
                                        <div class="col-10">
                                            <input name="avatar" type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="email">Email</label>
                                        <div class="col-10">
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="password">Password</label>
                                        <div class="col-10">
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="password_confirmation">
                                            Confirmation</label>
                                        <div class="col-10">
                                            <input type="password" name="password_confirmation"
                                                id="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
                            </div>
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
