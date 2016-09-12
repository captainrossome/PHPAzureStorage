@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1 class="page-header">Welcome to the Hackathon!</h1>
        <h2>
            Employee List
            <a class="btn btn-success pull-right" href="{{ route('homes.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h2>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($homes->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Title</th>
                            <th>City</th>
                            <th>Phone</th>
                            
                            <th class="text-right"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($homes as $home)
                            <tr>
                                <td>{{$home->LastName}}, {{$home->FirstName}}</td>
                                <td>{{$home->Title}}</td>
                                <td>{{$home->City}}</td>
                                <td>{{$home->HomePhone}}</td>
                                
                                <td class="text-right">
                                    <!--<a class="btn btn-xs btn-primary" href="{{ route('homes.show', $home->EmployeeID) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>-->
                                    <a class="btn btn-xs btn-warning" href="{{ route('homes.edit', $home->EmployeeID) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('homes.destroy', $home->EmployeeID) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $homes->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection