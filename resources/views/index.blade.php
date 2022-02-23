@extends('layouts.app')

@section('content')
    <?php
    global $posts;
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $posts_per_page = 9;

    $params = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => $posts_per_page,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'paged'          => $paged,
    ];

    query_posts($params);
    ?>

    @if(have_posts())
        @while(have_posts()) @php(the_post())
                <div class="component blog-post">
                    <div class="blog-post__date">{{ the_date() }}</div>
                    <h3 class="blog-post__title"><a href="{{ get_the_permalink() }}">{{ the_title() }}</a></h3>
                    <div class="blog-post__excerpt">
                        {!! the_excerpt() !!}
                    </div>
                    <a href="{{ get_the_permalink() }}" class="btn btn--read-more">Read more</a>
                </div>
        @endwhile

        <!-- Pagination -->
        <div class="row justify-content-center">
            <div class="col-auto">
                <?php
                global $wp_query;
                global $page, $numpages, $multipage, $more;

                if ( is_singular() ) {
                    $page_key = 'page';
                    $paged = $page;
                    $max = $numpages;
                } else {
                    $page_key = 'paged';
                    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
                    $max = $wp_query->max_num_pages;
                }

                $big = 999999999; // need an unlikely integer
                $output = '<div class="pagination">';
                $output .= paginate_links(array(
                    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format'    => '?paged=%#%',
                    'current'   => max(1, get_query_var('paged')),
                    'total'     => $max,
                    //$q is your custom query
                    'prev_text' => __('<i class="fas fa-angle-left"></i>'),
                    'next_text' => __('<i class="fas fa-angle-right"></i>'),
                    //        'add_args' => array('boat_type'=>$boat_type,'no_of_passengers'=>$number_of_passengers)
                ));
                $output .= '</div><!-- navigation ENDS -->';
                if ( $max > 1 ) {
                    echo $output;
                }
                ?>
            </div>
        </div>
    @else
        <h2>No Posts Found</h2>
    @endif

    @php(wp_reset_query())

@endsection
