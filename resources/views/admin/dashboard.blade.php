@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You (<a href="{{route('admin.users.show', Auth::user()->id)}}">{{Auth::user()->email}}</a>) are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
