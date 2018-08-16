@extends('layouts.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit After</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('afters.index') }}"> Back</a>
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


    <form action="{{ route('books.update',$book->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $book->name }}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <strong>Select After:</strong>
                    <div class="autocomplete" style="width:300px;">
                        <select class="multipleSelect" multiple name="after_ids[]">
                            @foreach($afters as $after)
                                <option value="{{$after->id}}"
                                    @foreach($book->afters as $bookAfter)
                                        @if($after->id == $bookAfter->id)
                                            selected="selected"
                                        @endif
                                    @endforeach
                                    >{{$after->name}}
                                </option>
                            @endforeach
                        </select>
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
    </script>
@endsection