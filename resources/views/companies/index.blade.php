@extends('layouts.master')

@section('content')
<div class="card my-4">
    <div class="card-header d-flex jutify-content-between p-4">
        <h3>Companies</h3>
        <div class="ml-auto"><a href="{{route('companies.create')}}" class="btn btn-success">Create Company</a></div>
    </div>
    <div class="card-body">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
    <table class="table table-borderd table-responsive">
        <tr>
            <th>Id</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Action</th>
        </tr>
        @foreach ($companies as $company)
        <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
            <td><img src="{{asset('storage')}}/{{$company->logo}}" alt="No logo found" width="100px" height="100px"></td>
            <td>
                <a href="{{route('companies.edit', $company->id)}}" class="btn btn-info">Edit</a>
                <form action="{{route('companies.destroy', $company->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger">Delete</a>
                </form>
                
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{ $companies->links() }}
    </div>
    </div>
</div>
@endsection