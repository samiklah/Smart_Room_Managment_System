@extends('layouts.app')

@section('content')
<div class="container">
    
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lectures') }}</div>

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
                            @foreach ($lectures as $lecture)
                                <tr>
                                    <th scope="row">{{ $lecture->id }}</th>
                                    <td>{{ $lecture->course_num }}</td>
                                    <td>{{ $lecture->course_title }}</td>
                                    <td>{{ $lecture->lecturer }}</td>
                                    <td>{{ $lecture->room_number }}</td>
                                    <td>{{ $lecture->section_id }}</td>
                                    <td>{{ $lecture->from }}</td>
                                    <td>{{ $lecture->to }}</td>
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
