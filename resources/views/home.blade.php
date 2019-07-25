@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard <small class="fa-pull-right">{{ date('d/m/Y H:i') }}</small></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Welcome <span class="font-weight-bold">{{ Auth::user()->name }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
