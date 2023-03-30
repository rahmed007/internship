@extends('layouts.master')

@section('content')
<div class="card my-4">
    <div class="card-header d-flex jutify-content-between p-4">
        <h3>Create Company</h3>
        <div class="ml-auto"><a href="{{route('companies.index')}}" class="btn btn-success">Company List</a></div>
    </div>
    <div class="card-body">
        <form action="{{route('companies.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Logo</label>
                <input type="file" name="logo" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Save Record">
            </div>
        </form>
    </div>
</div>
@endsection