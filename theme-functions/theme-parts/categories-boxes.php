<div class="blog-categories-wrapper">
    <div class="container-fluid">
        <div class="row">
            <?php
                $loop_type = 'post';
                $args = array(
                    'post_type' => $loop_type,
                    'posts_per_page' => 3,
                    'order_by' => 'date',
                );

                $q = new WP_Query($args);
                if($q->have_posts()):
                    while($q->have_posts()):
                        $q->the_post();
                
                ?>
            <!-- Box/Category Box -->
            <div class="col-lg-4">
                <div class="post-box" style="background-image:url(<?php echo get_the_post_thumbnail_url()?>)">
                    <div class="post-box-info">
                        <button><a href="<?php the_permalink(); ?>"><?php 
                        if($loop_type == 'post'){
                            echo 'Post';
                        }
                        else{
                            echo 'Category';
                        }
                        
                        ?></a></button>
                    </div>
                </div>
            </div>
            <!-- Post/Category Box -->
            <?php
                endwhile;
                wp_reset_query();
            endif;
            ?>
        </div>
    </div>
</div>