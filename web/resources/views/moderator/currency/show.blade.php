@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Currency {{ $currency->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $currency->id }}</td>
                                    </tr>
                                    <tr><th> Message </th><td> {{ $currency->currency }} </td></tr><tr><th> Price </th><td> {{ $currency->price }} </td></tr></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
