
 <?php 
 global $onpoint_opt;
 ?>               
                
                   <!-- Blog Listing Item -->
                   <div class="col-lg-11 mx-auto">
                        <div class="blog-listing-item">
                             <div class="blog-img" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)">
                                    <ul class="social-icons">
                                             <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                             </div>
                             <div class="row">
                                 <div class="col-lg-9 offset-lg-3">
                                         <div class="blog-listing-content">
                                                 <h4><?php the_title(); ?></h4>
                                                 <p>
                                                     <?php the_excerpt(); ?>
                                                 </p>
                                                 <div class="meta-info">
                                                    
                                                     <h5><?php echo esc_html__(the_category()); ?></h5><span class="separator">|</span>
                                                     <h5><?php echo get_the_date(); ?></h5>
                                                 </div>
                                                 
                                             </div>
                                             <button class="underlined"><a href="<?php echo get_the_permalink(); ?>">Read More</a></button>
                                 </div>
                             </div>
                        </div>
                    </div>
                   <!-- End Blog Listing Item -->

            
    <!-- End Blog Page Wrapper -->