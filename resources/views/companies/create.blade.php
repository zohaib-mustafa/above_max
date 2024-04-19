
@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Company</h2>
               <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" >
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group ">
        <label for="logo">Logo</label><br>
        <input type="file" class="form-control-file" id="logo" name="logo">
    </div>
    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" id="website" name="website">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>
</div></div></div>
@endsection
