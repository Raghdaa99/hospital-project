<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $appointments= Appointment::all();
        return view('cms.appointments.index',['appointments'=>$appointments]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $pateints = Patient::all();
        
        return response()->view('cms.appointments.create',['users'=>$users,'pateints'=>$pateints]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'user_id' => 'required|numeric|exists:users,id',
            'patient_id' => 'required|numeric|exists:patients,id',
            'date' => 'required|date_format:d-m-Y',
            'time' => 'required|date_format:H:i:s',
            'emergency' => 'required|boolean',
        ]);

        // dd(Carbon::parse($request->input('date'))->format('d-m-Y'));
        if (!$validator->fails()) {
            $appointment = new Appointment();
            $appointment->user_id = $request->input('user_id');
            $appointment->patient_id = $request->input('patient_id');
            $appointment->time = Carbon::parse($request->input('time'))->format('H:i');
            $appointment->date = Carbon::parse($request->input('date'))->format('Y-m-d');
            $appointment->emergency = $request->input('emergency');

            $isSaved = $appointment->save();
            return response()->json(
                [
                    'message' => $isSaved ? 'Appointment created successfully' : 'Create failed!'
                ],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        dd('dgfvbm');
    }

    public function showDoctor()
    {
        // dd('ddd');

        $appointments= Appointment::where('user_id',auth()->user()->id)->orderBy('emergency', 'DESC')->orderBy('date', 'DESC')->orderBy('time', 'DESC')->get();
        return view('cms.Show.showDoctorAppointment',['appointments'=>$appointments]);
      
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
//dd($appointment);
        $users = User::all();
        $pateints = Patient::all();
        
        return response()->view('cms.appointments.edit',['users'=>$users,'pateints'=>$pateints,'appointment'=>$appointment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $validator = Validator($request->all(), [
            'user_id' => 'required|numeric|exists:users,id',
            'patient_id' => 'required|numeric|exists:patients,id',
            'date' => 'required|date_format:d-m-Y',
            'time' => 'required|date_format:H:i:s',
            'emergency' => 'required|boolean',
        ]);

        // dd(Carbon::parse($request->input('date'))->format('d-m-Y'));
        if (!$validator->fails()) {
            $appointment->user_id = $request->input('user_id');
            $appointment->patient_id = $request->input('patient_id');
            $appointment->time = Carbon::parse($request->input('time'))->format('H:i');
            $appointment->date = Carbon::parse($request->input('date'))->format('Y-m-d');
            $appointment->emergency = $request->input('emergency');

            $isSaved = $appointment->save();
            return response()->json(
                [
                    'message' => $isSaved ? 'Appointment created successfully' : 'Create failed!'
                ],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $isDeleted = $appointment->delete();
        return response()->json(
            ['message' => $isDeleted ? 'Deleted successfully' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
