@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())
    @includeFirst(['content.content-single-' . get_post_type(), 'content.content-single'])
    @endwhile
@endsection
