@extends('layouts.master')

@section('content')
<div class="card my-4">
    <div class="card-header d-flex jutify-content-between p-4">
        <h3>Create Multiple Employee</h3>
        <div class="ml-auto"><a href="{{route('employees.create')}}" class="btn btn-success">Create Single Employee</a></div>
        <div class="ml-auto"><a href="{{route('employees.index')}}" class="btn btn-success">Employee List</a></div>
    </div>
    <div class="card-body">
        <form action="{{route('multiple.employee.store')}}" method="post">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <td>
                            <a href="javascript:void(0)" class="addRow btn btn-info btn-sm">Add Row</a>
                        </td>
                        <td> 
                            <label for="">First Name</label>
                        </td>
                        <td> 
                            <label for="">Last Name</label>
                        </td>
                        <td> 
                            <label for="">Company Name</label>
                        </td>
                        <td> 
                            <label for="">Email</label>
                        </td>
                        <td> 
                            <label for="">Phone</label>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="javascript:void(0)" class="deleteRow btn btn-danger btn-sm">Remove</a>
                        </td>
                        <td>
                            <input type="text" name="first_name[]" class="form-control">
                            @error('first_name.*')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <input type="text" name="last_name[]" class="form-control">
                            @error('last_name.*')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <select name="company_id[]" class="form-control">
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="email" name="email[]" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="phone[]" class="form-control">
                        </td>
                    </tr>
                </tbody>
             <div class="form-group">
                    
                </div>
                <div class="form-group">
                   
                </div> 
            </table>
            <input type="submit" class="btn btn-success" value="Save Record">
        </form>
    </div>
</div>
@endsection

@section('jquerycode')
    <script>
        $('thead').on('click', '.addRow', function(){
        var tr ="<tr>"+  
                "<td>"+
                    "<a href='javascript:void(0)' class='deleteRow btn btn-danger btn-sm'>Remove</a>"+
                "</td>"+
                "<td>"+
                        "<input class='form-control' name='first_name[]' type='text' autocomplete='off'>"+
                        "@error('first_name.1')"+
                            "<div class='alert alert-danger'>{{ $message }}</div>"+
                        "@enderror"+
                "</td>"+
                "<td>"+
                        "<input class='form-control' name='last_name[]' type='text' autocomplete='off'>"+
                "</td>"+
                "<td>"+
                        "<select name='company_id[]' class='form-control'>"+
                                "<option value=''>Select Company</option>"+
                                "@foreach ($companies as $company)"+
                                    "<option value='{{$company->id}}'>{{$company->name}}</option>"+
                                "@endforeach"+
                            "</select>"+
                "</td>"+
                "<td>"+
                        "<input class='form-control' name='email[]' type='text'>"+
                "</td>"+
                "<td>"+
                        "<input class='form-control' name='phone[]' type='text' autocomplete='off'>"+
                "</td>"+
                "</tr>";
        $('tbody').append(tr);

        $('tbody').on('click', '.deleteRow', function(){
        $(this).parent().parent().remove();
    });
    });
    </script>
@endsection