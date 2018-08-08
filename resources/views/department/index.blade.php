@extends('layouts.client')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Departments</h3>
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

                                        <!-- search box -->
                                        <div class="col-5 col-md-4">
                                            <form method="GET" action="{{ route('department.index') }}">

                                                <div class="input-group">
                                                    <div class="input-group-prepend" id="button-addon2">
                                                        <button class="btn btn-primary" type="submit"><i class="ft-search"></i></button>
                                                    </div>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        placeholder="Search"
                                                        name="search"
                                                        value="{{ $search }}"
                                                    >
                                                </div>
                                            </form>
                                        </div>

                                        <!-- add new department -->
                                        <div class="col-7 col-md-8">
                                            <div class="text-right">
                                                <a
                                                    href="{{ route('department.create') }}"
                                                    class="btn btn-outline-dark"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    data-original-title="Create New Department"
                                                >
                                                    <i class="fa fa-building-o font-medium-4"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <!-- table department list -->
                                    <div class="table-responsive">

                                        <table class="table table-lg table-striped">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                 @foreach ($department as $key => $value)
                                                    <tr>
                                                        <td>{{ $value['id'] }}</td>
                                                        <td>{{ $value['name'] }}</td>
                                                        <td>
                                                            <!-- department edit -->
                                                            <a href="{{ route('department.edit', $value['id']) }}">
                                                                <i
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    data-original-title="Edit"
                                                                    class="ft-edit action-icon-size"
                                                                ></i>
                                                            </a>

                                                            <!-- department delete -->
                                                            <a href="{{ route('department.destroy', $value['id']) }}" class="deleteButton">
                                                                <i
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    data-original-title="Delete"
                                                                    class="ft-trash-2 action-icon-size action-icon-position"
                                                                ></i>
                                                            </a>

                                                            <!-- department delete form -->
                                                            <form method="POST" action="{{ route('department.destroy', $value['id']) }}" class="deleteForm">
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