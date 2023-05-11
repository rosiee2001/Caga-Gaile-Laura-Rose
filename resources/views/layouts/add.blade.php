@extends('layouts.main')
<title>Students Schedule</title>
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Students Schedule</h1>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Schedule</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->FirstName }} {{ $student->MiddleName }} {{ $student->LastName }}</td>
                                    <td>{{ $student->Gender }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($student->schedules as $schedule)
                                                <li>{{ $schedule->date }} ({{ $schedule->time }} - {{ $schedule->day }})</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
