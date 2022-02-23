<?php

    /*
    |--------------------------------------------------------------------------
    | Register The Auto Loader
    |--------------------------------------------------------------------------
    |
    | Composer provides a convenient, automatically generated class loader for
    | our theme. We will simply require it into the script here so that we
    | don't have to worry about manually loading any of our classes later on.
    |
    */

    if ( ! file_exists($composer = __DIR__ . '/vendor/autoload.php') ) {
        wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
    }

    require $composer;

    /*
    |--------------------------------------------------------------------------
    | Run The Theme
    |--------------------------------------------------------------------------
    |
    | Once we have the theme booted, we can handle the incoming request using
    | the application's HTTP kernel. Then, we will send the response back
    | to this client's browser, allowing them to enjoy our application.
    |
    */

    require_once __DIR__ . '/bootstrap/app.php';


    /**
     *
     * Function to return Image src data-set
     *
     * @param $image Image array
     * @param string $size it can be thumbnail, full etc
     * @param string $alt alt-tag value
     * @param string $class custom class name
     * @param bool $is_echo true/false
     * @return string echo to page if is_echo is true other wise return string
     *
     * USAGE: {!! the_image(get_field('my-image'), 'my-class', 'full') !!}
     */
    function the_image($image, $class = '', $size = 'full') {
        echo wp_get_attachment_image($image['ID'], $size, '', array('alt' => $image['alt'], 'class' => $class));
    }

    /**
     * Add numeric pagination
     * @param int $page_count
     * @param null $query
     */
    function numeric_pagination( $page_count = 9, $query = null ) {
        if ( null == $query ) {
            global $wp_query;
            $query = $wp_query;
        }

        if ( 1 >= $query->max_num_pages ) {
            return;
        }

        $big = 9999999999; // need an unlikely integer

        echo '<div class="component--pagination">';
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var( 'paged' ) ),
            'total' => $query->max_num_pages,
            'end_size' => 0,
            'type' => 'list',
            'prev_next' => false,
            'mid_size' => $page_count,
            'next_text' => __( '', 'textdomain' ),
            'prev_text' => __( '', 'textdomain' )
        ) );
        echo '</div>';
    }
