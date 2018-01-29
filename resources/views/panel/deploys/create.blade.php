@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts._errors')
            @include('layouts._success')
            <div class="col-md-12">
                <h2>
                    Creating new deploy
                </h2>
                <form action="{{ url('/deploys') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="git_url">Git URL:</label>
                        <input type="text" name="git_url" id="git_url" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="git_branch">Git Branch:</label>
                        <input type="text" name="git_branch" id="git_branch" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stack_id">Technology Stack:</label> [ <a href="{{ url('/stacks/create') }}">Add</a>
                        ]
                        <select name="stack_id" id="stack_id" class="form-control">
                            @foreach($stacks as $stack)
                                @if(Session::get('stack_id') == $stack->id)
                                    @if($selected = ' selected')@endif
                                @else
                                    @if($selected = '')@endif
                                @endif
                                <option value="{{ $stack->id }}"{{ $selected }}>{{ $stack->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="server_id">Server:</label> [ <a href="{{ url('/servers/create') }}">Add</a> ]
                        <select name="server_id" id="server_id" class="form-control">
                            @foreach($servers as $server)
                                <option value="{{ $server->id }}">{{ $server->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{ url('/') }}" type="submit" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-primary" value="Save and Deploy">
                </form>
            </div>
        </div>
    </div>
@endsection