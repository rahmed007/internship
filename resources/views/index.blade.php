@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-md-12 my-4 py-4 text-center">
            <h2>Dashboard</h2>
        </div>
        <div class="col-md-6 my-4 py-4">
            <div class="card">
                <div class="card-header dashboard-link">
                    <a href="{{route('companies.index')}}"><h3>Companies</h3></a>
                </div>
                <div class="card-body">
                <h3>{{$companies->count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-4 py-4">
            <div class="card">
                <div class="card-header dashboard-link">
                    <a href="{{route('employees.index')}}"><h3>Employees</h3></a>
                </div>
                <div class="card-body">
                    <h3>{{$employees->count()}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection