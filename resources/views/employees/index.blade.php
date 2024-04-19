
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Employees</h2>
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">Add New Employee</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-lg-12">
        {{ $employees->links() }}
    </div>
            </div>
        </div>
    </div>
@endsection
