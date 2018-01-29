@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts._success')
        <div class="row">
            <div class="col-md-3">
                <h2>
                    Stacks
                    <small class="pull-right">
                        <a href="{{ url('/stacks/create')  }}" class="btn btn-default">Add</a>
                    </small>
                </h2>
                @if(count($stacks) > 0)
                    <div class="list-group">
                        @foreach($stacks->all() as $stack)
                            <a href="{{ url('/stacks', $stack->id) }}" class="list-group-item">{{ $stack->name }}</a>
                        @endforeach
                    </div>
                @else
                    No stacks found.
                @endif
            </div>
            <div class="col-md-9">
                <h2>
                    Deployment
                    <small class="pull-right">
                        <a href="{{ url('/deploys/create')  }}" class="btn btn-default">New Deploy</a>
                    </small>
                </h2>
                @if(count($deploys) > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                Deploy Name
                            </th>
                            <th>
                                Stack
                            </th>
                            <th>
                                Created at
                            </th>
                            <th>

                            </th>
                            <th>

                            </th>
                            <th>

                            </th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deploys as $deploy)
                            <tr>
                                <td>{{  $deploy->name }}</td>
                                <td>{{  $deploy->stacks->name }}</td>
                                <td>{{ $deploy->created_at->diffForHumans() }}</td>
                                <td>
                                    <div id="status{{$deploy->id}}" class="status--check">
                                        <a href="javascript:checkStatus('status{{$deploy->id}}', '{{ $deploy->servers->test_url }}')" class="btn btn-primary">
                                            Check status
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:checkStatus('{{ $deploy->servers->test_url }}')" class="btn btn-primary">
                                        Deploy Again
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:checkStatus('{{ $deploy->servers->test_url }}')" class="btn btn-danger">
                                        Rollback
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ url('/deploys', $deploy->id) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    No deployment was created.
                @endif
            </div>
        </div>
    </div>
@endsection