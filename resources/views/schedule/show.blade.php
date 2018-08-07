@extends('layouts.client')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">{{ $doctor['name'] }}</h3>
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
                                        <div class="col-8 col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <form method="GET" action="{{ route('schedule.show', $doctor['id']) }}">

                                                    <div class="input-group">
                                                        <div class="input-group-prepend" id="button-addon2">
                                                            <button class="btn btn-primary" type="submit"><i class="ft-search"></i></button>
                                                        </div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Search Patient"
                                                            name="search"
                                                            value="{{ $search }}"
                                                        >
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <!-- table schedule list -->
                                    <div class="table-responsive">

                                        <table class="table table-lg table-striped">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>Patient Name</th>
                                                    <th class="schedule_td_center">Appointment Date</th>
                                                    <th class="schedule_td_center">Phone Number</th>
                                                    <th class="schedule_td_center">Email</th>
                                                    <th class="schedule_td_center">Status</th>
                                                    <th class="schedule_td_center">Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                 @foreach ($schedules as $key => $value)
                                                    <tr>
                                                        <td>{{ $value['name'] }}</td>
                                                        <td class="schedule_td_center">{{ $value['appointment_time'] }}</td>
                                                        <td class="schedule_td_center">{{ $value['phone_number'] }}</td>
                                                        <td class="schedule_td_center">{{ $value['email'] }}</td>
                                                        <td class="schedule_td_center">
                                                            @if ($value['status'] === 0)
                                                                <p class="text-danger">Pending</p>
                                                            @elseif ($value['status'] === 1)
                                                                <p class="text-warning">Confirm</p>
                                                            @else
                                                                <p class="text-success">Complete</p>
                                                            @endif
                                                        </td>
                                                        <td>

                                                            <!-- schedule edit -->
                                                            <a href="{{ route('schedule.edit', $value['id']) }}">
                                                                <i
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    data-original-title="Edit"
                                                                    class="ft-edit action-icon-size"
                                                                ></i>
                                                            </a>

                                                            <!-- schedule confirm and complete -->
                                                            @if ($value['status'] == 0)

                                                                <!-- for schedule confirm -->
                                                                <a href="{{ route('schedule.confirm', $value['id']) }}" class="clientAD">
                                                                    <i
                                                                        data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Confirm"
                                                                        class="ft-check-circle action-icon-size"
                                                                    ></i>
                                                                </a>
                                                                <form method="POST" action="{{ route('schedule.confirm', $value['id']) }}">
                                                                    @csrf

                                                                    <input type="hidden" name="_method" value="PATCH">
                                                                </form>

                                                            @elseif ($value['status'] == 1)

                                                                <!-- for schedule complete -->
                                                                <a href="{{ route('schedule.complete', $value['id']) }}" class="clientAD">
                                                                    <i
                                                                        data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Complete"
                                                                        class="ft-check-square action-icon-size"
                                                                    ></i>
                                                                </a>
                                                                <form method="POST" action="{{ route('schedule.complete', $value['id']) }}">
                                                                    @csrf

                                                                    <input type="hidden" name="_method" value="PATCH">
                                                                </form>

                                                            @endif

                                                            <!-- schedule delete -->
                                                            <a href="{{ route('schedule.destroy', $value['id']) }}" class="deleteButton">
                                                                <i
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    data-original-title="Delete"
                                                                    class="ft-trash-2 action-icon-size action-icon-position"
                                                                ></i>
                                                            </a>
                                                            <form method="POST" action="{{ route('schedule.destroy', $value['id']) }}" class="deleteForm">
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