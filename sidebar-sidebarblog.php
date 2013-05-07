        <div id="sidebarblog" class="fluid-sidebar sidebar span4" role="complementary">
<ul>
  <?php wp_list_pages('sort_column=menu_order&exclude_tree=5&exclude=90,6'); ?>
</ul>
					<?php dynamic_sidebar( 'sidebarblog' ); ?>

					<?php if ( is_active_sidebar( 'sidebarblog' ) ) : ?>
					<?php else : ?>
					<?php endif; ?>

				</div>
