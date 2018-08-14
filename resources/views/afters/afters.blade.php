@extends('layouts.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Afters</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('afters.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($afters as $after)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $after->name }}</td>
                <td>
                    <form action="{{ route('afters.destroy',$after->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('afters.show',$after->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('afters.edit',$after->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $afters->links() !!}


@endsection