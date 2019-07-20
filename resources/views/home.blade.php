@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel Principal</div>

                <div class="card-body">
                    @if (Auth::check())
                        <div class="alert alert-success" role="alert">
                            {{ __('') }}
                        </div>
                    @else
                    	<div class="alert alert-warning" role="alert">
                            {{ __('') }}
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
