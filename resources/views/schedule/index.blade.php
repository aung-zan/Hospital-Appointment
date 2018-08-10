@extends('layouts.client')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Schedule</h3>
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

                                        <!-- datetime calendar -->
                                        <div class="col-12 col-md-3 col-sm-6">
                                            <div class="form-group">

                                                <form method="GET" action="{{ route('schedule.index') }}" id="dateTimeForm">
                                                    <div class="input-group date">

                                                        <div class="input-group-prepend" id="button-addon1">
                                                            <span class="input-group-text">
                                                                <span class="fa fa-calendar-o"></span>
                                                            </span>
                                                        </div>
                                                        <input
                                                            type="text"
                                                            name="date"
                                                            class="form-control dateTimePicker"
                                                            placeholder="Choose A Date"
                                                            value="{{ $date }}"
                                                        >
                                                    </div>
                                                </form>

                                            </div>
                                        </div>

                                        <!-- search box -->
                                        <div class="col-12 col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <form method="GET" action="{{ route('schedule.index') }}">

                                                    <div class="input-group">
                                                        <div class="input-group-prepend" id="button-addon2">
                                                            <button class="btn btn-primary" type="submit"><i class="ft-search"></i></button>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Search Doctor" name="search" value="{{ $search }}">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- show all doctors with today date -->
                                        <div class="col-6 col-md-3 col-sm-6">
                                            <form method="GET" action="{{ route('schedule.index') }}">
                                                <input type="hidden" name="show_all" value="true">
                                                <button
                                                    type="submit"
                                                    class="btn btn-light"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    data-original-title="Show All Doctors With Today Date"
                                                >
                                                    Show All
                                                </button>
                                            </form>
                                        </div>

                                        <!-- add new schedule -->
                                        <div class="col-6 col-md-3 col-sm-6">
                                            <div class="text-right">
                                                <a
                                                    href="{{ route('schedule.create') }}"
                                                    class="btn btn-outline-dark"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    data-original-title="Create New Schedule"
                                                    id="addSchedule"
                                                >
                                                    <i class="fa fa-calendar-o font-medium-4"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <!-- table schedule list -->
                                    <div class="table-responsive">

                                        <table class="table table-lg table-striped">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>Doctor</th>
                                                    <th class="schedule_td_center">Total Patient</th>
                                                    <th class="schedule_td_center">Pending</th>
                                                    <th class="schedule_td_center">Confirm</th>
                                                    <th class="schedule_td_center">Complete</th>
                                                    <th class="schedule_td_center">Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                 @foreach ($doctors as $key => $value)
                                                    <tr>
                                                        <td>{{ $value['name'] }}</td>
                                                        <td class="schedule_td_center">{{ $value['patient_numbers'] }}</td>
                                                        <td class="schedule_td_center">{{ $value['pending'] }}</td>
                                                        <td class="schedule_td_center">{{ $value['confirm'] }}</td>
                                                        <td class="schedule_td_center">{{ $value['complete'] }}</td>
                                                        <td class="schedule_td_center">
                                                            <!-- schedule detail -->
                                                            <a href="{{ route('schedule.show', $value['id']) }}">
                                                                <i
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    data-original-title="Detail"
                                                                    class="fa fa-folder-open action-icon-size"
                                                                ></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                 @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    {{ $doctors->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection