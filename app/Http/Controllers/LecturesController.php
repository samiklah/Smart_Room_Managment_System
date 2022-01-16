<?php

namespace App\Http\Controllers;

use App\Models\Lectures;
use App\Http\Requests\StoreLecturesRequest;
use App\Http\Requests\UpdateLecturesRequest;
use Carbon\Carbon;

class LecturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mytime = Carbon::now();
        $mytime->setTimezone('Asia/Amman');
        $hour = $mytime->format('h');
        $lectures = Lectures::where('from','11')->get();
        
        return view('welcome', compact('lectures'));
        //return dd($lectures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLecturesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLecturesRequest $request)
    {
        $this->validate($request, [
            'coures-num' => 'required|number',
            'coures-title' => 'required',
            'lecturer' => 'required',
            'room-num' => 'required|number',
            'section_id' => 'required|number',
            'from' => 'required',
            'to' => 'required',
        ]);

        return view('home');
    }

    public function add()
    {
        

        $data = request()->validate([
            'coures-num' => 'required|numeric',
            'coures-title' => 'required',
            'lecturer' => 'required',
            'room-num' => 'required|numeric',
            'section_id' => 'required|numeric',
            'from' => 'required',
            'to' => 'required',
        ]);

        $lectures = new Lectures;

        $lectures->user_id = auth()->user()->id;
        $lectures->course_title =  $data['coures-title'];
        $lectures->course_num = $data['coures-num'];
        $lectures->lecturer = $data['lecturer'];
        $lectures->room_number = $data['room-num'];
        $lectures->section_id = $data['section_id'];
        $lectures->from = $data['from'];
        $lectures->to = $data['to'];

        $lectures->save();

        return view('home');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function show(Lectures $lectures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function edit(Lectures $lectures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLecturesRequest  $request
     * @param  \App\Models\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLecturesRequest $request, Lectures $lectures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lectures $lectures)
    {
        //
    }

    public function delete($id)
    {
        $Lecture = Lectures::find($id);
        if(auth()->user()->id == $Lecture->user_id){
            $Lecture->delete();
            return view('home');
        }else{
            return view('home');
        }
    }
}
