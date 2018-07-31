@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Create The Client</h3>
                </div>
            </div>

            <div class="content-body">

                <!-- create information -->
                <div class="card">
                    <div class="card-header">

                        <!-- session alert message -->
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissable mb-1" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <!-- input validation error message -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissable mb-1" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                <ul role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="card-content">
                        <div class="card-body">

                            <form method="POST" action="{{ route('client.store') }}" class="addForm" novalidate>
                                @csrf

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Username</label>
                                    </div>

                                    <div class="col-md-5 col-7">
                                        <fieldset class="form-group has-icon-left">
                                            <div class="controls">

                                                <input
                                                    type="text"
                                                    class="form-control round"
                                                    name="username"
                                                    id="user-name"
                                                    placeholder="Username"
                                                    required
                                                    data-validation-required-message="This field is required"
                                                    value="{{ old('username') }}"
                                                >

                                                <div class="form-control-position">
                                                    <i class="ft-lock danger"></i>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Name</label>
                                    </div>

                                    <div class="col-md-5 col-7">
                                        <fieldset class="form-group has-icon-left">

                                            <input
                                                type="text"
                                                class="form-control round"
                                                name="name"
                                                id="user-username"
                                                placeholder="Name"
                                                value="{{ old('name') }}"
                                            >

                                            <div class="form-control-position">
                                                <i class="ft-user danger"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Email</label>
                                    </div>

                                    <div class="col-md-5 col-7">
                                        <fieldset class="form-group has-icon-left">
                                            <div class="controls">

                                                <input
                                                    type="email"
                                                    class="form-control round"
                                                    name="email"
                                                    id="user-email"
                                                    placeholder="Email"
                                                    required
                                                    data-validation-required-message="This field is required"
                                                    value="{{ old('email') }}"
                                                >

                                                <div class="form-control-position">
                                                    <i class="ft-mail danger"></i>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Password</label>
                                    </div>

                                    <div class="col-md-5 col-7">
                                        <fieldset class="form-group has-icon-left">

                                            <input
                                                type="password"
                                                class="form-control round"
                                                name="password"
                                                id="user-password"
                                                placeholder="Password"
                                            >

                                            <div class="form-control-position">
                                                <i class="ft-log-in danger"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3 col-md-2">
                                        <label class="label-position">Phone Number</label>
                                    </div>

                                    <div class="col-7 col-md-5">
                                        <fieldset class="form-group has-icon-left">

                                            <input type="number" name="phone_number" class="form-control round" placeholder="Phone number">
                                            <div class="col-10">
                                                <label style="color: red">Please insert the most use phone number.</label>
                                            </div>

                                            <div class="form-control-position">
                                                <i class="ft-phone-call danger"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Save </button>
                                    <a href="{{ route('client.index') }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection