@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! Thanks for creating an account and becoming a user.
                    Extended user experiences are currently being developed. Send an email to
                    thekickoff@gmail.com letting us know who you are and what type of features
                    you would love to see.
                    Let's go back <a href="/">Home</a> to view some more content
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
