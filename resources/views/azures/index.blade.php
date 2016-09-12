@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1 class="page-header">Welcome to the Hackathon!</h1>
        <h2>
            Blob List
            <a class="btn btn-success pull-right" href="{{ route('azures.upload') }}"><i class="glyphicon glyphicon-upload"></i> Upload</a>
        </h2>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(count($blobs))
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            
                            <th class="text-right"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($blobs as $blob)
                            <tr>
                                <td>{{ $blob->getName() }}</td>
                                
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="{{ $blob->getUrl() }}"><i class="glyphicon glyphicon-download"></i> Download</a>
                                    <form action="{{ route('azures.destroy')}}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="blobName" value="{{$blob->getName()}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection