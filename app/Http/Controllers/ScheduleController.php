<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Log, App\Doctor, App\Schedule;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = date('Y-m-d');
        $search = '';

        // no search(remove all session data)
        if ($request->has('show_all')) {
            $request->session()->forget(['date', 'search']);;
        }

        // date search request
            if ($request->has('date')) {
                $date = $request->date;
                Session::put('date', $date);
                // $request->session()->put('date', $date);
            }
            if (Session::has('date')) {
                $date = Session::get('date');
            }

        // name search request
            if ($request->has('search')) {
                $search = $request->search;
                Session::put('search', $search);
                // $request->session()->put('search', $search);
            }
            if (Session::has('search')) {
                $search = Session::get('search');
            }

        $doctors = Doctor::where('name', 'LIKE', "%{$search}%")
                            ->withCount([
                                'schedule as patient_numbers' => function($joinQuery1) use($date) {
                                    $joinQuery1->where('appointment_time','LIKE', "%{$date}%");
                                },
                                'schedule as pending' => function($joinQuery2) use($date) {
                                    $joinQuery2->where('appointment_time','LIKE', "%{$date}%")
                                                ->where('status', 0);
                                },
                                'schedule as confirm' => function($joinQuery3) use($date) {
                                    $joinQuery3->where('appointment_time','LIKE', "%{$date}%")
                                                ->where('status', 1);
                                },
                                'schedule as complete' => function($joinQuery4) use($date) {
                                    $joinQuery4->where('appointment_time','LIKE', "%{$date}%")
                                                ->where('status', 2);
                                },
                            ])
                            ->paginate(5);

        return view('schedule.index', compact('doctors', 'search', 'date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = date('Y-m-d');
        $doctors = Doctor::orderBy('name')->pluck('id', 'name');

        return view('schedule.add', compact('doctors', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id'             => 'required',
            'name'                  => 'required',
            'appointment_time'      => 'required|date',
            'phone_number'          => 'required|numeric',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedule.create')
                        ->with('success', 'The Appointment has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $date = date('Y-m-d');
        $search = '';

        if (Session::has('date')) {
            $date = Session::get('date');
        }

        if ($request->has('search')) {
            $search = $request->search;
        }

        $doctor = Doctor::findOrFail($id, ['name', 'id']);

        $schedules = Schedule::where('doctor_id', $id)
                                ->where('appointment_time', $date)
                                ->where('name', 'LIKE', "%{$search}%")
                                ->paginate(5);

        return view('schedule.show', compact('schedules', 'search', 'doctor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $doctors = Doctor::orderBy('name')->pluck('id', 'name');

        return view('schedule.edit', compact('schedule', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $request->validate([
            'doctor_id'             => 'required',
            'name'                  => 'required',
            'appointment_time'      => 'required|date',
            'phone_number'          => 'required|numeric',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedule.edit', compact('schedule'))
                        ->with('success', 'The Appointment has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Modify the status resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $schedule = Schedule::findOrFail($id);

        $schedule->status = 1;
        $schedule->save();

        $doctor['id'] = $schedule['doctor_id'];

        return redirect()->route('schedule.show', $doctor['id'])
                        ->with('success', 'The Appointment has been confirmed.');

    }

    /**
     * Modify the status resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
        $schedule = Schedule::findOrFail($id);

        $schedule->status = 2;
        $schedule->save();

        $doctor['id'] = $schedule['doctor_id'];

        return redirect()->route('schedule.show', $doctor['id'])
                        ->with('success', 'The Appointment has been completed.');
    }
}
