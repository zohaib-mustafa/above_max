
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Edit Employee</h2>
                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                     <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" >
                    </div>
                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" >
                    </div>
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select class="form-control" id="company_id" name="company_id" >
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $employee->email }}" >
                    </div>
                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}" >
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
