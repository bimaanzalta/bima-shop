@extends('layouts.app')
@section('title','Detail User')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- meta -->
                <div class="profile-user-box card-box bg-custom">
                    <div class="row">
                        <div class="col-sm-6">
                            <span class="pull-left mr-3"><img src="{{ asset('storage/'.$user->avatar) }}" alt=""
                                    class="thumb-lg rounded-circle"></span>
                            <div class="media-body text-white">
                                <h4 class="mt-1 mb-1 font-18">{{ $user->username }}</h4>
                                @php
                                $roles = json_decode($user->roles);
                                @endphp
                                <p class="font-13 text-light">@foreach ($roles as $role)
                                    {{ $role }},
                                    @endforeach</p>
                                <p class="text-light mb-0">California, United States</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-right">
                                <a href="{{ route('users.edit',$user->id ) }}" class="btn btn-light waves-effect">
                                    <i class="mdi mdi-account-settings-variant mr-1"></i> Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ meta -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- Personal-Information -->
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-20">Personal Information</h4>
                    <div class="panel-body">
                        <p class="text-muted font-13">
                            Hye, I’m Johnathan Doe residing in this beautiful world. I create websites and mobile apps
                            with great UX
                            and UI design. I have done work with big companies like Nokia, Google and Yahoo. Meet me or
                            Contact me
                            for any queries. One Extra line for filling space. Fill as many you want.
                        </p>

                        <hr>

                        <div class="text-left">
                            <p class="text-muted font-13"><strong>Name :</strong> <span
                                    class="m-l-15">{{ $user->name }}</span></p>

                            <p class="text-muted font-13"><strong>Mobile :</strong><span
                                    class="m-l-15">{{ $user->phone }}</span>
                            </p>

                            <p class="text-muted font-13"><strong>Email :</strong> <span
                                    class="m-l-15">{{ $user->email }}</span>
                            </p>

                            <p class="text-muted font-13"><strong>Address :</strong> <span
                                    class="m-l-15">{{ $user->address }}</span>
                            </p>

                            <p class="text-muted font-13"><strong>Languages :</strong>
                                <span class="m-l-5">
                                    <span class="flag-icon flag-icon-us m-r-5 m-t-0" title="us"></span>
                                    <span>English</span>
                                </span>
                                <span class="m-l-5">
                                    <span class="flag-icon flag-icon-de m-r-5" title="de"></span>
                                    <span>German</span>
                                </span>
                                <span class="m-l-5">
                                    <span class="flag-icon flag-icon-es m-r-5" title="es"></span>
                                    <span>Spanish</span>
                                </span>
                                <span class="m-l-5">
                                    <span class="flag-icon flag-icon-fr m-r-5" title="fr"></span>
                                    <span>French</span>
                                </span>
                            </p>

                        </div>

                        <ul class="social-links list-inline m-t-20 m-b-0">
                            <li class="list-inline-item">
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href=""
                                    data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href=""
                                    data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href=""
                                    data-original-title="Skype"><i class="fa fa-skype"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Personal-Information -->
            </div>
        </div>
    </div>
</div>
@endsection
