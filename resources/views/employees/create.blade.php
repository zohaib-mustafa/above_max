
@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Employee</h2>
<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" >
    </div>
    <div class="form-group">
        <label for="name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" >
    </div> 
    <div class="form-group">
        <label for="company_id">Company</label>
        <select class="form-control" id="company_id" name="company_id" >
            <option value="">Select Company</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="email">Phone</label>
        <input type="number" class="form-control" id="phone" name="phone">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>
</div></div></div>
@endsection

