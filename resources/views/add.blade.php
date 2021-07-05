@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('inventory Management') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success')}}
                        </div>
                    @endif

                    @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail')}}
                        </div>
                    @endif
                    <form action="/additem" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-items mt-5">
                            <label for="">Item Code</label>
                            <input type="text" class="form-control" name="itmCode" id="itmCode">
                        </div>

                        <div class="form-items mt-5">
                            <label for="">Item Details</label>
                            <input type="text" class="form-control" name="itmDetails" id="itmDetails">
                        </div>

                        <div class="form-items mt-5">
                            <label for="">Item Price</label>
                            <input type="text" class="form-control" name="itmValue" id="itmValue">
                        </div>

                        <div class="form-items">
                            <input class="btn btn-primary mt-5" class="form-control" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection