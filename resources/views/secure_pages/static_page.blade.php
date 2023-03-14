@extends('layouts.master_admin')

@section('content')
    <h3 class="mt-4">Static Page</h3>
    <ol class="breadcrumb breadcrumb-link mb-4">
        <li class="breadcrumb-item active">
            <i class="bi bi-grip-vertical"></i><a href="{{ route('secure.layouts-nav.static-page') }}">Static page</a>
        </li>
    </ol>
@endsection