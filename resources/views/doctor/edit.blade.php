@extends('layouts.client')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Create The Department</h3>
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

                            <form method="POST" action="{{ route('doctor.update', $doctor['id']) }}" class="addForm" novalidate>
                                @csrf

                                <input type="hidden" name="_method" value="PATCH">

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Department</label>
                                    </div>

                                    <div class="col-md-5 col-7">
                                        <fieldset class="form-group has-icon-left">
                                            <div class="controls">

                                                <select
                                                    class="select2-icons form-control block"
                                                    id="responsive_single"
                                                    name="department_id"
                                                    style="width: 100%"
                                                    data-validation-required-message="This field is required"
                                                    required
                                                >
                                                    <option></option>
                                                    @foreach ($departments as $key => $value)
                                                        <option
                                                            value="{{ $value }}"
                                                            {{ ($value == $doctor['department_id'])? 'selected':''}}
                                                        >
                                                            {{ $key }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <div class="form-control-position">
                                                    <i class="fa fa-building-o danger"></i>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Doctor Name</label>
                                    </div>

                                    <div class="col-md-5 col-7">
                                        <fieldset class="form-group has-icon-left">
                                            <div class="controls">

                                                <input
                                                    type="text"
                                                    class="form-control round"
                                                    name="name"
                                                    id="user-username"
                                                    placeholder="Doctor Name"
                                                    value="{{ (old('name') == null)? $doctor['name']:old('name') }}"
                                                    data-validation-required-message="This field is required"
                                                    required
                                                >

                                                <div class="form-control-position">
                                                    <i class="fa fa-info danger"></i>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">About</label>
                                    </div>

                                    <div class="col-md-5 col-7">
                                        <fieldset class="form-group has-icon-left">
                                            <div class="controls">

                                                <input
                                                    type="text"
                                                    class="form-control round"
                                                    name="about"
                                                    id="user-username"
                                                    placeholder="Example: His degree"
                                                    value="{{ (old('about') == null)? $doctor['about']:old('about') }}"
                                                    data-validation-required-message="This field is required"
                                                    required
                                                >

                                                <div class="form-control-position">
                                                    <i class="fa fa-graduation-cap danger"></i>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Update </button>
                                    <a href="{{ route('doctor.index') }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection