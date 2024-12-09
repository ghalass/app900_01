@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                Admin Home Page {{ Auth::guard('admin')->user()->name }}
            </div>
        </div>
    </div>
@endsection
