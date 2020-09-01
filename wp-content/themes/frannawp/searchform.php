<?php $unique_id    = uniqid( 'search-form-' ); ?>

<form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET" class="main-search-form">
    <input type="search" name="s" class="form-control" id="<?php echo esc_attr( $unique_id ); ?>" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search', 'frannawp' ); ?>">
</form>