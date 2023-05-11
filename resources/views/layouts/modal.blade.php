@foreach($students as $student)
    <div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Student Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('liststudents.update', $student->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-label">First Name</div>
                            <input type="text" name="FirstName" id="editFirstName" class="form-control" value="{{ $student->FirstName }}">
                            @error('FirstName')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-label">Middle Name</div>
                            <input type="text" name="MiddleName" id="editMiddleName" class="form-control" value="{{ $student->MiddleName }}">
                            @error('MiddleName')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-label">Last Name</div>
                            <input type="text" name="LastName" id="editLastName" class="form-control" value="{{ $student->LastName }}">
                            @error('LastName')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-label">Extension</div>
                            <input type="text" name="Extension" id="editExtension" class="form-control" value="{{ $student->Extension }}">
                        </div>
                        <div class="form-group">
                            <div class="form-label">Gender</div>
                            <select name="Gender" id="editGender" class="form-control">
                                <option value="">--Select Gender--</option>
                                <option value="Male" {{ $student->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $student->Gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Rather not to Say" {{ $student->Gender == 'Rather not to Say' ? 'selected' : '' }}>Rather not to Say</option>
                            </select>
                            @error('Gender')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-label">Date of Birth</div>
                            <input type="date" name="DateofBirth" id="editDateofBirth" class="form-control" value="{{ $student->DateofBirth }}">
                            @error('DateofBirth')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-label">Civil status</div>
                            <select name="Civilstatus" id="editCivilstatus" class="form-control">
                                <option value="">--Select Status--</option>
                                <option value="Single" {{ $student->Civilstatus == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ $student->Civilstatus == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Separated" {{ $student->Civilstatus == 'Separated' ? 'selected' : '' }}>Separated</option>
                                <option value="Widow" {{ $student->Civilstatus == 'Widow' ? 'selected' : '' }}>Widow</option>
                            </select>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="Update()">Save changes</button>
                    </div>
                    <script>
                        function Update() {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Updated Succesfully',
                                showConfirmButton: false,
                                timer: 2000,
                                toast: true,
                                heightAuto: false
                                });
                            }
                    </script>
                </form>
            </div>
        </div>
    </div>


@endforeach