@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Upload Blob </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('azures.createBlob') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="blobFile">Blog File</label>
                    <input type="file" class="form-control" id="blobFile" name="blobFile">
                    
                </div>
                
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <a class="btn btn-link pull-right" href="{{ route('azures.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection

