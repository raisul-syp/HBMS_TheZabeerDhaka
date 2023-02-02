@extends('layouts.errors')
@section('title', 'Forbidden Error!')

@section('content')

<div class="card mb-0 border-radius-0">
    <div class="card-body p-5">
        <h1>403</h1>
        <h3> Forbidden Error!</h3>
        <h5>{{ $exception->getMessage() }}</h5>
        <a class="btn btn-primary" href="{{ route('admin.dashboard') }}"><i class="fa fa-long-arrow-left"></i> Back to Dashboard</a>
    </div>
</div>

@endsection