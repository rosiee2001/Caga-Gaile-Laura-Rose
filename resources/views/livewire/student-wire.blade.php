<div>
    <div class="card-body">
        @if($forUpdate)
        <h5>Update Student</h5>
        @else
        <h5>Add New Students</h5>
        @endif
        <form wire:submit.prevent="saveStudent">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">First Name</div>
                        <input type="" wire:model="firstname" class="form-control" value="{{ $firstname?? '' }}">
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
                        <input type="" wire:model="middlename" class="form-control">
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
                        <input type="" wire:model="lastname" class="form-control">
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
                                    <input type="" wire:model="extension" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label">Date of Birth</div>
                                    <input type="date" wire:model="dob" class="form-control">
                                    @error('DOB')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label">Civil status</div>
                                    <select wire:model="civilstatus" class="form-control">
                                        <option value="">--Select Status--</option> 
                                        <option value="Single">Single</option> 
                                        <option value="Married">Married</option> 
                                        <option value="Separated">Separated</option> 
                                        <option value="Widow">Widow</option> 
                                    </select>
                                    @error('Civilstatus')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label">Place of birth</div>
                                    <input type="" wire:model="placeofbirth" class="form-control">
                                    @error('PlaceofBirth')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                @if($forUpdate)
                                <button class="btn btn-primary">Update</button>
                                @else
                                <button class="btn btn-primary">Save</button>
                                @endif
                             </div>
                        </div>
                    </form>
                </div>
 
                <hr>
                <table class="table">
                    <thead>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Extension</th>
                        <th>DOB</th>
                        <th>Place of birth</th>
                        <th>Civil status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(isset($list))
                            @foreach($list as $c)
                                <tr>
                                    <td>{{ $c->firstname }}</td>
                                    <td>{{ $c->middlename }}</td>
                                    <td>{{ $c->lastname }}</td>
                                    <td>{{ $c->extension }}</td>
                                    <td>{{ $c->dob }}</td>
                                    <td>{{ $c->placeofbirth }}</td>
                                    <td>{{ $c->civilstatus }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm"
                                        wire:click="update('{{ $c->id }}')">
                                        Edit</button>

                                        <button class="btn btn-danger btn-sm"
                                        wire:click="delete('{{ $c->id }}')">
                                        Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                </hr>
</div>