@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts._errors')
            <div class="col-md-12">
                <h2>Creating Stack</h2>
                <form action="{{ url('/stacks') }}" method="POST">
                    {{ csrf_field()  }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <a href="{{ url('/') }}" type="submit" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </div>
@endsection