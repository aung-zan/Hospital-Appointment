@extends('layouts.client')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Doctors</h3>
                </div>
            </div>

            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body">

                                    @if (Session::has('success'))
                                        <div class="alert alert-success alert-dismissable mb-1" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif

                                    <div class="row">

                                        <!-- search name box -->
                                        <div class="col-7 col-md-3">
                                            <form method="GET" action="{{ route('doctor.index') }}">

                                                <div class="input-group">
                                                    <div class="input-group-prepend" id="button-addon2">
                                                        <button class="btn btn-primary" type="submit"><i class="ft-search"></i></button>
                                                    </div>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        placeholder="Search Name"
                                                        name="search"
                                                        value="{{ $search }}"
                                                    >
                                                </div>
                                            </form>
                                        </div>

                                        <!-- search department box -->
                                        <div class="col-5 col-md-3">
                                            <form method="GET" action="{{ route('doctor.index') }}">
                                                <input type="hidden" name="departmentSearch" id="departmentSearch">
                                            </form>

                                            <fieldset class="form-group has-icon-left">

                                                <select class="select2-doctor-index form-control" id="responsive_single" style="width: 100%">
                                                    <option></option>
                                                    @foreach ($departments as $key => $val)
                                                        <option value="{{ $val }}" {{ $val == $departmentID? 'selected':'' }}>{{ $key }}</option>
                                                    @endforeach
                                                </select>

                                                <div class="form-control-position">
                                                    <i class="fa fa-building-o light"></i>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <!-- add new doctor -->
                                        <div class="col-3 col-md-6">
                                            <div class="text-right">
                                                <a
                                                    href="{{ route('doctor.create') }}"
                                                    class="btn btn-outline-dark"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    data-original-title="Add New Doctor"
                                                >
                                                    <i class="fa fa-user-md font-medium-4"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <!-- table doctor list -->
                                    <div class="table-responsive">

                                        <table class="table table-lg table-striped">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>Doctor Name</th>
                                                    <th>Department</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                 @foreach ($doctors as $key => $value)
                                                    <tr>
                                                        <td>{{ $value['name'] }}</td>
                                                        <td>{{ $value['department']['name'] }}</td>
                                                        <td>
                                                            <!-- doctor edit -->
                                                            <a href="{{ route('doctor.edit', $value['id']) }}">
                                                                <i
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    data-original-title="Edit"
                                                                    class="ft-edit action-icon-size"
                                                                ></i>
                                                            </a>

                                                            <!-- doctor delete -->
                                                            <a href="{{ route('doctor.destroy', $value['id']) }}" class="deleteButton">
                                                                <i
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    data-original-title="Delete"
                                                                    class="ft-trash-2 action-icon-size action-icon-position"
                                                                ></i>
                                                            </a>

                                                            <!-- doctor delete form -->
                                                            <form method="POST" action="{{ route('doctor.destroy', $value['id']) }}" class="deleteForm">
                                                                @csrf

                                                                <input type="hidden" name="_method" value="DELETE">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                 @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection