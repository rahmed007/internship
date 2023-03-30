@extends('layouts.master')

@section('content')
<div class="card my-4">
    <div class="card-header d-flex jutify-content-between p-4">
        <h3>Edit Company</h3>
        <div class="ml-auto"><a href="{{route('companies.index')}}" class="btn btn-success">Company List</a></div>
    </div>
    <div class="card-body">
        <form action="{{route('companies.update', $company->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{$company->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" value="{{$company->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Logo</label>
                <input type="file" name="logo" value="{{$company->logo}}" class="form-control">
                <img src="{{asset('storage')}}/{{$company->logo}}" alt="no logo found" width="100px" height="100px">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Save Record">
            </div>
        </form>
    </div>
</div>
@endsection