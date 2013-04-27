				<div id="sidebar1" class="fluid-sidebar sidebar span4" role="complementary">
				

          <?php

            if($post->post_parent)
              $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
            else
              $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
              if ($children) { ?>
                <ul>
                <?php echo $children; ?>
                </ul>
              <?php } ?>



						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
					<?php else : ?>
					<?php endif; ?>

				</div>
