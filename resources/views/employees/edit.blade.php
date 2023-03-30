@extends('layouts.master')

@section('content')
<div class="card my-4">
    <div class="card-header d-flex jutify-content-between p-4">
        <h3>Edit Employee</h3>
        <div class="ml-auto"><a href="{{route('employees.index')}}" class="btn btn-success">Employee List</a></div>
    </div>
    <div class="card-body">
        <form action="{{route('employees.update', $employee->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" name="first_name" value="{{$employee->first_name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" name="last_name" value="{{$employee->last_name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Company Name</label>
                <select name="company_id" id="" class="form-control">
                    <option value="">Select Company</option>
                    @foreach ($companies as $company)
                        <option value="{{$company->id}}" {{($company->id == $employee->company_id) ? 'selected': ''}}>{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" value="{{$employee->email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" value="{{$employee->phone}}" class="form-control">
            </div>
           
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Save Record">
            </div>
        </form>
    </div>
</div>
@endsection