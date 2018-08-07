@extends('layouts.client')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Create The Appointment</h3>
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

                            <form method="POST" action="{{ route('schedule.store') }}" class="addForm" novalidate>
                                @csrf

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Doctors</label>
                                    </div>

                                    <div class="col-md-5 col-7">
                                        <fieldset class="form-group has-icon-left">
                                            <div class="controls">

                                                <select
                                                    class="select2-schedule-index form-control block"
                                                    id="responsive_single"
                                                    name="doctor_id"
                                                    style="width: 100%"
                                                    data-validation-required-message="This field is required"
                                                    required
                                                >
                                                    <option></option>
                                                    @foreach ($doctors as $key => $value)
                                                        <option value="{{ $value }}">{{ $key }}</option>
                                                    @endforeach
                                                </select>

                                                <div class="form-control-position">
                                                    <i class="fa fa-user-md danger"></i>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Patient Name</label>
                                    </div>

                                    <div class="col-md-5 col-7">
                                        <fieldset class="form-group has-icon-left">
                                            <div class="controls">

                                                <input
                                                    type="text"
                                                    class="form-control round"
                                                    name="name"
                                                    id="user-username"
                                                    placeholder="Patient Name"
                                                    value="{{ old('name') }}"
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
                                        <label class="label-position">Appointment Date</label>
                                    </div>

                                    <div class="col-md-5 col-7">
                                        <fieldset class="form-group has-icon-left">
                                            <div class="controls">

                                                <input
                                                    type="text"
                                                    class="form-control round"
                                                    name="appointment_time"
                                                    id="dateTimePicker2"
                                                    placeholder="Appointment Date"
                                                    value="{{ old('appointment_time') == null? $date:old('appointment_time') }}"
                                                    data-validation-required-message="This field is required"
                                                    required
                                                >

                                                <div class="form-control-position">
                                                    <i class="fa fa-calendar-o danger"></i>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <label class="label-position">Phone Number</label>
                                    </div>

                                    <div class="col-md-5 col-7">
                                        <fieldset class="form-group has-icon-left">
                                            <div class="controls">

                                                <input
                                                    type="number"
                                                    class="form-control round"
                                                    name="phone_number"
                                                    id="phone_number"
                                                    placeholder="Phone Number"
                                                    value="{{ old('phone_number') }}"
                                                    data-validation-required-message="This field is required"
                                                    required
                                                >

                                                <div class="form-control-position">
                                                    <i class="fa fa-phone danger"></i>
                                                </div>

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
                                                    id="email"
                                                    placeholder="Email"
                                                    value="{{ old('email') }}"
                                                >

                                                <div class="form-control-position">
                                                    <i class="fa fa-envelope-o danger"></i>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Save </button>
                                    <a href="{{ route('schedule.index') }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection