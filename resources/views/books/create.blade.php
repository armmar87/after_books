@extends('layouts.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('books.store') }}" method="POST">
        @csrf


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Book Name:</strong>
                    <input  style="margin-bottom: 20px" type="text" name="name" class="form-control" placeholder="Book Name">
                    <strong>Select After:</strong>
                    <div class="autocomplete" style="width:300px;">
                        <select class="multipleSelect" multiple name="after_ids[]">
                            @foreach($afters as $after)
                                <option value="{{$after->id}}">{{$after->name}}</option>
                            @endforeach
                        </select>

                        {{--<input class="form-control" multiple id="myInput" type="text" name="after_id" placeholder="Select After">--}}
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>



@endsection

@section('scripts')
    <script>
        $('.multipleSelect').fastselect();

        // var afters = ['ash', 'arm', 'gg'];
        // autocomplete(document.getElementById("myInput"), afters);
    </script>
@endsection