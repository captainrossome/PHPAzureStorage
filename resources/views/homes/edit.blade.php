@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Edit Item</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('homes.update', $home->EmployeeID) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="FirstName">FirstName</label>
                    <input type="text" class="form-control" id="FirstName" name="FirstName" value="{{$home->FirstName}}">
                </div>
                <div class="form-group">
                    <label for="LastName">LastName</label>
                    <input type="text" class="form-control" id="LastName" name="LastName" value="{{$home->LastName}}">
                </div>
                <div class="form-group">
                    <label for="Title">Title</label>
                    <input type="text" class="form-control" id="Title" name="Title" value="{{$home->Title}}">
                </div>
                <div class="form-group">
                    <label for="City">City</label>
                    <input type="text" class="form-control" id="City" name="City" value="{{$home->City}}">
                </div>
                <div class="form-group">
                    <label for="HomePhone">HomePhone</label>
                    <input type="text" class="form-control" id="HomePhone" name="HomePhone" value="{{$home->HomePhone}}">
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('homes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
