@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-lg-2 mb-2">
                <div class="card">
                    <div class="card-header py-1">{{ __('Sidebar') }}</div>

                    <div class="card-body p-1">
                        <livewire:ConfigsSidebar />
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-lg-10">
                <div class="card">
                    <div class="card-header py-1">{{ __('Configs') }}</div>

                    <div class="card-body">

                        @yield('content_body')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
