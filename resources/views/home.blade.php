@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if(@Auth::user()->hasRole('Admin'))
                        soy turista!
                    @endif
                    @role('Admin')
                        I am a writer!
                    @else
                        I am not a writer...
                    @endrole
                    <hr>
                    hola
                    @can('admin.todo.holi')
                        holdssadjkash
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
