@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Update Company
        </div>
        <div class="card-body">
            <form action="{{ route('companies.update', $company->id) }}" method="post" autocomplete="FALSE" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <div class="form-group row pb-2">
                    <label for="staticName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticName" name="name" placeholder="Name" value="{{ old('name', $company->name) }}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticEmail" name="email" placeholder="email@example.com" value="{{ old('email', $company->email) }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="staticFile" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                        <img src="{{ asset('images/' . $company->logo) }}" alt="">
                        <input type="file" class="form-control-plaintext" id="staticFile" name="logo">

                        @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="staticWebsite" class="col-sm-2 col-form-label">Website</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticWebsite" name="website" placeholder="Website" value="{{ old('website', $company->website) }}">

                        @error('website')
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