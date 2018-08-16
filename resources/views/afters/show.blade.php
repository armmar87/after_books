@extends('layouts.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show After Books</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('afters.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $after->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Books:</strong>
                @foreach($after->books as $book)
                    {{  !$loop->last ? $book->name .', ' : $book->name }}
                @endforeach
            </div>
        </div>
    </div>
@endsection