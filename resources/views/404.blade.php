@extends('layouts.app')

@section('content')
    <section id="error404">
    <div class="error404__text-404">404</div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Whoops!</h1>
                <h2 class="mb-3">The page you are trying to reach does not exist.</h2>
                <a href="/" class="btn btn--primary btn--icon-left"><i class="fas fa-home"></i> Go Home</a>
            </div>
        </div>
    </div>
    </section>
@endsection
