@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts._errors')
            <div class="col-md-12">
                <h2>
                    Creating new server
                </h2>
                {!! Form::open(array('action' => 'ServersController@store','files'=>true)) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="host">Host:</label>
                        <input type="text" name="host" id="host" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="protocol">Protocol:</label>
                        <select name="protocol" id="protocol" class="form-control">
                            <option value="ftp">FTP</option>
                            <option value="sftp" selected>SFTP</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Logon Type:</label>
                        <select name="type" id="type" class="form-control">
                            <option value="anonymous">Anonymous</option>
                            <option value="normal" selected>Normal</option>
                            <option value="key">Key File</option>
                        </select>
                    </div>
                    <div class="username-input form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="password-input form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="key-file form-group hide">
                        <label for="username">Key File:</label>
                        {!! Form::file('key', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="deploy_path">Server Path:</label> <i>(ie. /var/www/html)</i>
                        <input type="text" name="deploy_path" id="deploy_path" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="test_url">Test URL:</label> <i>(ie. http://domain.com/site)</i>
                        <input type="text" name="test_url" id="test_url" class="form-control">
                    </div>
                    <a href="{{ url('/deploys/create') }}" type="submit" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-primary" value="Save">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection