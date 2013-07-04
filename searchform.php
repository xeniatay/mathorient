<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-stacked form-search">
	<div class="clearfix">
		<div class="input-append">
            <input class="search-input" type="text" name="s" id="search" placeholder="<?php _e("Search","bonestheme"); ?>" value="<?php the_search_query(); ?>" />
            <button type="submit" class="btn search-btn">
                <i class="icon-search"></i>
            </button>
		</div>

    </div>
</form>