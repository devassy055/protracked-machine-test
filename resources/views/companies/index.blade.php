@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-12 text-right">
        <a class="btn btn-success" href="{{ route('companies.create') }}">Add Company</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Website</th>
            <th>Action</th>
        </thead>
        @foreach($companies as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>
                <img src="{{ asset('images/' . $company->logo) }}" alt="">
            </td>
            <td>{{ $company->website }}</td>
            <td>
                <a class="btn btn-info ml-1" href="{{ route('companies.edit', $company->id) }}">Edit</a>

                <form class="deleteGroup" action="{{ route('companies.destroy', $company->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button id="delete-button" type="submit" title="Delete Company" class="btn btn-danger ml-1">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $companies->links() }}
</div>

@endsection