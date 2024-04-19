
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Companies</h2>
                    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add New Company</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>
                                    @if ($company->logo)
                                        <img src="{{ asset('storage/logos/' . $company->logo) }}" alt="{{ $company->name }} Logo" style="max-width: 100px;">
                                    @else
                                   
                                        <img src="https://medvirturials.com/img/old_logo.png" alt="{{ $company->name }} Logo" style="max-width: 100px;">
                                    @endif
                                </td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-lg-12">
        {{ $companies->links() }}
    </div>
            </div>
        </div>
    </div>
@endsection
