@extends('layouts.master_public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Hi ') }} @guest {{ __('there ') }} @else {{ Auth::user()->name }} @endguest !
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('SB Admin Laravel welcome page') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
