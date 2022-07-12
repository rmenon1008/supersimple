<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <label>
        <span class="screen-reader-text">
            <?php echo _x('Search for:', 'label') ?></span>
        <input type="search" autocapitalize="none" autocomplete="off" class="search-field" placeholder="<?php echo esc_attr_x('search', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" <?php echo is_search() ? 'autofocus' : '' ?> onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" />
    </label>
    <button type="submit" class="search-submit" aria-label="search" value="<?php echo esc_attr_x('search', 'submit button') ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button>
</form>