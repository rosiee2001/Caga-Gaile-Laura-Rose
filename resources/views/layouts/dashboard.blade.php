@extends('layouts.main')
<title>Dashboard</title>
@section('content')
    <div>
        <div class="card-body">
            <h5>Add New Students</h5>
            <form method="POST" action="{{ route('liststudents.store') }}" id="form">
                @csrf
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">First Name</div>
                            <input type="text" name="FirstName" id="FirstName" class="form-control" value="{{ old('FirstName') }}">
                            @error('FirstName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="form-label">Middle Name</div>
                            <input type="text" name="MiddleName" id="MiddleName" class="form-control" value="{{ old('MiddleName') }}">
                            @error('MiddleName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">Last Name</div>
                            <input type="text" name="LastName" id="LastName" class="form-control" value="{{ old('LastName') }}">
                            @error('LastName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="form-label">Extension</div>
                            <input type="text" name="Extension" id="Extension" class="form-control" value="{{ old('Extension') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">Gender</div>
                            <select name="Gender" id="Gender" class="form-control">
                                <option value="">--Select Gender--</option>
                                <option value="Male" {{ old('Gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('Gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Rather not to Say" {{ old('Gender') == 'Rather not to Say' ? 'selected' : '' }}>Rather not to Say</option>
                            </select>
                            @error('Gender')
                            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">Date of Birth</div>
                            <input type="date" name="DateofBirth" id="DateofBirth" class="form-control" value="{{ old('DateofBirth') }}">
                            @error('DateofBirth')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">Civil status</div>
                            <select name="Civilstatus" id="Civilstatus" class="form-control">
                                <option value="">--Select Status--</option>
                                <option value="Single" {{ old('Civilstatus') == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ old('Civilstatus') == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Separated" {{ old('Civilstatus') == 'Separated' ? 'selected' : '' }}>Separated</option>
                                <option value="Widow" {{ old('Civilstatus') == 'Widow' ? 'selected' : '' }}>Widow</option>
                            </select>
                            @error('Civilstatus')
                            <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                <button class="btn btn-primary" onclick="confirmSaved()">Save</button>
                                    </div>
                                    <script>
                                        function confirmSaved() {
                                            // Check if all required fields are filled in
                                            if (document.getElementById('FirstName').value == '' || document.getElementById('LastName').value == '' || document.getElementById('DateofBirth').value == '') {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'Please fill in all required fields.',
                                                });
                                                return false;
                                            } else {
                                                Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: 'Student has been Succesfully saved',
                                                showConfirmButton: false,
                                                timer: 2000,
                                                toast: true,
                                                heightAuto: false
                                            });
                                                return true;
                                            }
                                        }
                                    </script>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>QRCODE</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Extension</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Civil Status</th>
                                <th>Add Schedule</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                           
                       <td> {!! QrCode::size(45)->generate($student->FirstName) !!}</td>
                                <td>{{ $student->FirstName }}</td>
                                <td>{{ $student->MiddleName }}</td>
                                <td>{{ $student->LastName }}</td>
                                <td>{{ $student->Extension }}</td>
                                <td>{{ $student->Gender }}</td>
                                <td>{{ $student->DateofBirth }}</td>
                                <td>{{ $student->Civilstatus }}</td>
                                <td>    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addScheduleModal{{ $student->id }}">Add</button></td>
                                      @include('layouts.schedule')
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $student->id }}">Edit</button>
                               
                                <button type="button" class="btn btn-danger" onclick="confirmSave()">Remove</button>
                                <form method="POST" action="{{ route('liststudents.destroy', $student->id) }}" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <script>
                                    function confirmSave() {
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to revert this!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, Remove it!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // if user clicks "Yes", submit the form
                                                document.getElementById('delete-form').submit();
                                            }
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: 'Remove Student Succesfully',
                                                showConfirmButton: false,
                                                timer: 2000,
                                                toast: true,
                                                heightAuto: false
                                                });
                                        })
                                    }
                                    </script>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    </hr>
    </div>
    
    @endsection
    @include('layouts.modal')
