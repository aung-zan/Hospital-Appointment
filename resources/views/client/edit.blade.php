@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Edit The Client</h3>
                </div>
            </div>

            <div class="content-body">
                <!-- update information -->
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

                            <form method="POST" action="{{ route('client.update', $client->id) }}" novalidate>
                                @csrf

                                <input type="hidden" name="_method" value="PATCH">

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Username</label>
                                    </div>

                                    <div class="col-md-5 col-9">
                                        <fieldset class="form-group has-icon-left">
                                            <div class="controls">

                                                <input
                                                    type="text"
                                                    class="form-control round"
                                                    name="username"
                                                    id="user-name"
                                                    placeholder="Your username"
                                                    required
                                                    data-validation-required-message="This field is required"
                                                    value="{{ old('username') == null? $client->username:old('username') }}"
                                                >

                                                <div class="form-control-position">
                                                    <i class="ft-lock warning"></i>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Name</label>
                                    </div>

                                    <div class="col-md-5 col-9">
                                        <fieldset class="form-group has-icon-left">

                                            <input
                                                type="text"
                                                class="form-control round"
                                                name="name"
                                                id="user-username"
                                                placeholder="Your name"
                                                value="{{ old('name') == null? $client->name:old('name') }}"
                                            >

                                            <div class="form-control-position">
                                                <i class="ft-user warning"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Email</label>
                                    </div>

                                    <div class="col-md-5 col-9">
                                        <fieldset class="form-group has-icon-left">
                                            <div class="controls">

                                                <input
                                                    type="email"
                                                    class="form-control round"
                                                    name="email"
                                                    id="user-email"
                                                    placeholder="Your email"
                                                    required
                                                    data-validation-required-message="This field is required"
                                                    value="{{ old('email') == null? $client->email:old('email') }}"
                                                >

                                                <div class="form-control-position">
                                                    <i class="ft-mail warning"></i>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Password</label>
                                    </div>

                                    <div class="col-md-5 col-9">
                                        <fieldset class="form-group has-icon-left">

                                            <input
                                                type="password"
                                                class="form-control round"
                                                name="password"
                                                id="user-password"
                                                placeholder="Your password"
                                            >

                                            <div class="form-control-position">
                                                <i class="ft-log-in warning"></i>
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

                                            <input
                                                type="number"
                                                name="phone_number"
                                                class="form-control round"
                                                placeholder="Phone number"
                                                value="{{ old('phone_number') == null? $client->phone_number:old('phone_number') }}"
                                            >
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
                                    <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Update </button>
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