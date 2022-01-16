@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Lecture') }}</div>

                <div class="card-body">
                
                    <form method="POST" action="{{ route('addLecture') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="coures-num" class="col-md-4 col-form-label text-md-right">{{ __('Course Number') }}</label>

                            <div class="col-md-6">
                                <input id="coures-num" type="text" class="form-control @error('coures-num') is-invalid @enderror" name="coures-num" value="{{ old('coures-num') }}" required autofocus>

                                @error('coures-num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="coures-title" class="col-md-4 col-form-label text-md-right">{{ __('Course Title') }}</label>

                            <div class="col-md-6">
                                <input id="coures-title" type="text" class="form-control @error('coures-title') is-invalid @enderror" name="coures-title" value="{{ old('coures-title') }}" required autofocus>

                                @error('coures-title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="lecturer" class="col-md-4 col-form-label text-md-right">{{ __('Lecturer') }}</label>

                            <div class="col-md-6">
                                <input id="lecturer" type="text" class="form-control @error('lecturer') is-invalid @enderror" name="lecturer" value="{{ old('lecturer') }}" required autofocus>

                                @error('lecturer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="room-num" class="col-md-4 col-form-label text-md-right">{{ __('Room Number') }}</label>

                            <div class="col-md-6">
                                <input id="room-num" type="text" class="form-control @error('room-num') is-invalid @enderror" name="room-num" value="{{ old('room-num') }}" required autofocus>

                                @error('room-num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="section_id" class="col-md-4 col-form-label text-md-right">{{ __('Section Id') }}</label>

                            <div class="col-md-6">
                                <input id="section_id" type="text" class="form-control @error('section_id') is-invalid @enderror" name="section_id" value="{{ old('section_id') }}" required autofocus>

                                @error('section_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="from" class="col-md-4 col-form-label text-md-right">{{ __('From') }}</label>

                            <div class="col-md-6">
                                <select id="from" class="form-control @error('from') is-invalid @enderror" name="from" class="form-select" aria-label="Default select example" required>
                                    <option selected value="">Select</option>
                                    <option value="08">8AM</option>
                                    <option value="09">9AM</option>
                                    <option value="10">10AM</option>
                                    <option value="11">11AM</option>
                                    <option value="12">12AM</option>
                                    <option value="01">1PM</option>
                                    <option value="02">2PM</option>
                                    <option value="03">3PM</option>
                                    <option value="04">4PM</option>
                                </select>
                                @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="to" class="col-md-4 col-form-label text-md-right">{{ __('To') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('from') is-invalid @enderror" id="to" name="to" class="form-select" aria-label="Default select example" required>
                                    <option selected value="">Select</option>
                                    <option value="9AM">9AM</option>
                                    <option value="10AM">10AM</option>
                                    <option value="11AM">11AM</option>
                                    <option value="12AM">12AM</option>
                                    <option value="1PM">1PM</option>
                                    <option value="2PM">2PM</option>
                                    <option value="3PM">3PM</option>
                                    <option value="4PM">4PM</option>
                                    <option value="5PM">5PM</option>
                                </select>
                                @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Your Lectures') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                        <div class="table-responsive text-nowrap">
                            <!--Table-->
                            <table class="table table-striped">

                            <!--Table head-->
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Course Number</th>
                                <th>Course Title</th>
                                <th>Lecturer</th>
                                <th>Room Number</th>
                                <th>Section Id</th>
                                <th>From</th>
                                <th>to</th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                            @foreach (Auth::user()->lectures as $lecture)
                                <tr>
                                    <th scope="row">{{ $lecture->id }}</th>
                                    <td>{{ $lecture->course_num }}</td>
                                    <td>{{ $lecture->course_title }}</td>
                                    <td>{{ $lecture->lecturer }}</td>
                                    <td>{{ $lecture->room_number }}</td>
                                    <td>{{ $lecture->section_id }}</td>
                                    <td>{{ $lecture->from }}</td>
                                    <td>{{ $lecture->to }}</td>
                                    <td><a href="{{ url('/lecture/delete/'.$lecture->id) }}" class="link-danger">delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <!--Table body-->


                            </table>
                            <!--Table-->
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
