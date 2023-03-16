@extends('layouts.master_admin')

@section('content')
    <h3 class="mt-4">Blank Page</h3>
    <ol class="breadcrumb breadcrumb-link mb-4">
        <li class="breadcrumb-item active">
            <i class="bi bi-grip-vertical"></i><a href="{{ route('secure.users.blank-page') }}">Blank page</a>
        </li>
    </ol>
@endsection