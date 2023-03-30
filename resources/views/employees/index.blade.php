@extends('layouts.master')

@section('content')
<div class="card my-4">
    <div class="card-header d-flex jutify-content-between p-4">
        <h3>Employees</h3>
        <div class="ml-auto"><a href="{{route('employees.create')}}" class="btn btn-success">Create Employee</a></div>
    </div>
    <div class="card-body">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
    <table class="table table-borderd table-responsive">
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company Id</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->first_name}}</td>
            <td>{{$employee->last_name}}</td>
            <td>
                @if ($employee->company_id)
                    {{$employee->company->name}}
                @else
                    {{$employee->company_id}}
                @endif
            </td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone}}</td>

            <td>
                <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-info">Edit</a>
                <form action="{{route('employees.destroy', $employee->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger">Delete</button>
                </form>
                
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{ $employees->links() }}
    </div>
    </div>
</div>
@endsection