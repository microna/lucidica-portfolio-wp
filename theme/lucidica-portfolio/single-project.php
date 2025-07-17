<?php get_header(); ?>


<section class="hero">
    <div class="ellipse ellipse--top-left">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ellipse/Ellipse 2.svg" alt="">
    </div>
    <div class="ellipse ellipse--top-right">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ellipse/Ellipse 1.svg" alt="">
    </div>
    <div class="ellipse ellipse--top-center">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ellipse/Ellipse 3.svg" alt="">
    </div>
    </div>
    <div class="container">
        <div class="hero__content">
            <h1 class="hero__title"><?php the_title(); ?></h1>
            <div class="hero__text">
                <p>
                    <?php the_content(); ?>
                </p>
            </div>
            <a href="#" class="button-primary modal__btn">Contact Us</a>
        </div>
    </div>
</section>


<!-- Modal -->
<div class=" modal__wrapper">
    <div class="modal">
        <div class="modal__close"> <img src="<?php echo get_template_directory_uri(); ?>/img/cancel.svg" alt="cancel"
                width="10px" height="10px">
        </div>
        <h2 class="modal__title">Contact Us</h2>
        <?php echo do_shortcode('[contact-form-7 id="eed3344" title="Contact form 1"]'); ?>


    </div>
</div>


<section class="project-item">
    <div class="container">
        <h2 class="hero__title">Design Process</h2>

        <?php 
        // Check if the flexible content field has data
        if( have_rows('design_process') ): 

            
            // Loop through the flexible content rows
            while( have_rows('design_process') ): the_row();
                
                // Get the layout name
                $layout = get_row_layout();
                
                if( $layout == 'design_process_content' ): 
                    $text = get_sub_field('text');
                    $image = get_sub_field('image');
                    ?>

        <div class="project-item__row">
            <?php if( $text ): ?>
            <div class="project-item__text">
                <p><?php echo nl2br(esc_html($text)); ?></p>
            </div>
            <?php endif; ?>

            <?php if( $image ): ?>
            <div class="project-item__image">
                <img src="<?php echo esc_url($image); ?>" alt="Design Process Image" />
            </div>
            <?php endif; ?>
        </div>

        <?php endif;
                
            endwhile;
            
      
        endif; 
        ?>

    </div>
</section>



<?php get_footer(); ?>