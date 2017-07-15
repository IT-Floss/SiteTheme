<?php get_header(); ?>  

    <div class="grid grid-pad">

        <div class="col-1-1 titulo-pagina">
            <div class="content transicion">
                <h1 class="h1blog">IT FLOSS</h1>
                <div class="sub1"></div>
            </div>
        </div>

        <div class="col-8-12">
            <div class="content transicion tBlog">

                <h1 style="margin: 15px;">Posts con etiqueta "<?php single_tag_title(); ?>"</h1>

                <?php if (have_posts()) :  
                        while (have_posts()) : the_post(); ?>

                        <div id="post-<?php get_the_ID(); ?>" <?php post_class(); ?>>

                            <h2>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                    <span>
                                        <i class="ion-android-add"></i>
                                    </span>
                                </a>
                            </h2>

                            <span class="meta"><strong><?php echo get_post_meta(get_the_ID(), 'fecha', TRUE); ?></strong> </span>
                            <?php the_excerpt(__('Ver más »','it_floss')); ?>
                        </div>

                        <hr class="hr2">

                        <?php endwhile; ?>
                        
                        <?php numeric_posts_nav(); ?>
                        <?php wp_reset_query(); ?>

                    <?php  else: ?>
                        <div id="post-404" class="noposts">

                            <p><?php _e('Nada por aquí...','it_floss'); ?></p>

                        </div><!-- /#post-404 -->
                    <?php endif; ?>
                
                
            </div>
        </div>
        <div class="col-4-12">
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>
