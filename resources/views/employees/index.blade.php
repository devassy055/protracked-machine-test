@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-12 text-right">
        <a class="btn btn-success" href="{{ route('employees.create') }}">Add Employee</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <th>first name</th>
            <th>last name</th>
            <th>Company</th>
            <th>email</th>
            <th>phone number</th>
            <th>Action</th>
        </thead>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->company ? $employee->company->name : '' }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
            <td>
                <a class="btn btn-info ml-1" href="{{ route('employees.edit', $employee->id) }}">Edit</a>

                <form class="deleteGroup" action="{{ route('employees.destroy', $employee->id) }}" method="POST">
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
    {{ $employees->links() }}
</div>

@endsection