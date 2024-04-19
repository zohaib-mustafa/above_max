
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Edit Company</h2>
                <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}">
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label><br>
                        @if ($company->logo)
                            <img src="{{ asset('storage/logos/' . $company->logo) }}" alt="{{ $company->name }} Logo" style="max-width: 100px;">
                            <br><br>
                        @endif
                        <input type="file" class="form-control-file" id="logo" name="logo">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="{{ $company->website }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
