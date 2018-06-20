@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Currency</div>
                    <div class="panel-body">

                        {!! Form::open(['method' => 'GET', 'url' => '/', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Currency</th><th>Value</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($currency as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->currency }}</td><td>{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ url('/view/' . $item->id) }}" title="View Currency"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $currency->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
