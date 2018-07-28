@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Clients</h3>
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
                                            <form method="GET" action="{{ route('client.index') }}">

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

                                        <!-- add new client -->
                                        <div class="col-7 col-md-8">
                                            <div class="text-right">
                                                <a href="{{ route('client.create') }}" class="btn btn-social width-200 btn-outline-reservation">
                                                    <span class="ft-user-plus font-medium-4"></span>
                                                    Create New Client
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <!-- table client list -->
                                    <div class="table-responsive">

                                        <table class="table table-lg table-striped">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                 @foreach ($clients as $key => $value)
                                                    <tr>
                                                        <td>{{ $value['username'] }}</td>
                                                        <td>{{ $value['name'] }}</td>
                                                        <td>{{ $value['email'] }}</td>
                                                        <td>
                                                            <!-- client edit -->
                                                            <a href="{{ route('client.edit', $value['id']) }}">
                                                                <i
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    data-original-title="Edit"
                                                                    class="ft-edit action-icon-size"
                                                                ></i>
                                                            </a>

                                                            <!-- client delete -->
                                                            <a href="{{ route('client.destroy', $value['id']) }}" class="deleteButton">
                                                                <i
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    data-original-title="Delete"
                                                                    class="ft-trash-2 action-icon-size action-icon-position"
                                                                ></i>
                                                            </a>

                                                            <!-- client activate or deactivate -->
                                                            @if ($value['deactivate'] == 0)

                                                                <!-- client deactivate -->
                                                                <a href="{{ route('client.deactivate', $value['id']) }}" class="clientAD">
                                                                    <i
                                                                        data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Deactivate"
                                                                        class="ft-user-x action-icon-size"
                                                                    ></i>
                                                                </a>
                                                                <form method="POST" action="{{ route('client.deactivate', $value['id']) }}">
                                                                    @csrf

                                                                    <input type="hidden" name="_method" value="PATCH">
                                                                </form>

                                                            @else

                                                                <!-- client activate -->
                                                                <a href="{{ route('client.activate', $value['id']) }}" class="clientAD">
                                                                    <i
                                                                        data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Activate"
                                                                        class="ft-user-check action-icon-size"
                                                                    ></i>
                                                                </a>
                                                                <form method="POST" action="{{ route('client.activate', $value['id']) }}">
                                                                    @csrf

                                                                    <input type="hidden" name="_method" value="PATCH">
                                                                </form>

                                                            @endif

                                                            <!-- client delete form -->
                                                            <form method="POST" action="{{ route('client.destroy', $value['id']) }}" id="deleteForm">
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