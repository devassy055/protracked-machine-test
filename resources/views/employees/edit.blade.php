@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Update Company
        </div>
        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" method="post" autocomplete="FALSE" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <div class="form-group row pb-2">
                    <label for="staticName" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticName" name="first_name" placeholder="First name" value="{{ old('first_name',$employee->first_name) }}">

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Last name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticEmail" name="last_name" placeholder="enter the last name " value="{{ old('last_name', $employee->last_name) }}">

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="staticWebsite" class="col-sm-2 col-form-label">Company</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control-plaintext" id="staticWebsite" name="company_id" placeholder="company_id" value="{{ old('company_id', $employee->company_id) }}"> -->

                        <select id="supplierSelector" name="company_id" class="form-control @error('company_id') is-invalid @enderror">
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                            @if (old('company_id', $employee->company_id) == $company->id)
                            <option value="{{$company->id}}" selected>{{$company->name }}</option>
                            @else
                            <option value="{{$company->id}}">{{$company->name }}</option>
                            @endif
                            @endforeach
                        </select>

                        @error('company_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row pb-2">
                    <label for="staticWebsite" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticWebsite" name="email" placeholder="email" value="{{ old('email', $employee->email) }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="staticWebsite" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticWebsite" name="phone" placeholder="Phone" value="{{ old('Phone',$employee->phone) }}">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>

</div>
@endsection