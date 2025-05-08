<?php get_header(); ?>


<section class="hero">
    <div class="ellipse ellipse__position--top-left">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ellipse/Ellipse 2.svg" alt="">
    </div>
    <div class="ellipse ellipse__position--top-right">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ellipse/Ellipse 1.svg" alt="">
    </div>
    <div class="ellipse ellipse__position--top-center">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ellipse/Ellipse 3.svg" alt="">
    </div>
    </div>
    <div class="container">
        <div class="hero__content">
            <h1 class="hero__title">Projects</h1>
            <div class="hero__text">
                <p>
                    Our projects blend innovation, fresh ideas, and technical expertise.
                    We create websites that inspire and engage, turning visions into
                    impactful solutions.
                </p>
            </div>
            <a href="#" class="button-primary modal__btn">Contact Us</a>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal__wrapper">
    <div class="modal">
        <div class="modal__close"> <img src="<?php echo get_template_directory_uri(); ?>/img/cancel.svg" alt="cancel"
                width="10px" height="10px"></div>
        <h2 class="modal__title">Contact Us</h2>
        <form class="modal__body" action="">
            <input class="modal__input" type="text" placeholder="Enter your first name">
            <input class="modal__input" type="text" placeholder="Enter your phone number">
            <input class="modal__input" type="text" placeholder="Enter your last name">
            <input class="modal__input" type="text" placeholder="Enter your email">
            <input class="modal__input" type="text" placeholder="Enter your comment">
            <input class="button-secondary modal__btn" type="submit" value="Submit">
        </form>


    </div>
</div>
<!-- <a href="#" class="btn modal__btn modal__close">Open modal</a> -->

<section class="projects-list">
    <div class="container">
        <div class="projects__wrapper">


            <?php
            // Standard WordPress loop
            if (have_posts()) :
                while (have_posts()) : the_post();
                    // Get the featured image
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'project-thumbnail');
                    if (!$thumbnail) {
                        $thumbnail = get_template_directory_uri() . '/img/project-1.jpg'; // Fallback image
                    }
                    ?>
            <div class="project__item">
                <div class="project__item-image-wrapper">
                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                        loading="lazy" />
                </div>
                <div class="project-holder">
                    <div class="">
                        <p class="project__item-subtitle">Website</p>
                        <p class="project__item-title"><?php echo esc_html(get_the_title()); ?></p>
                    </div>
                    <div class="">
                        <a href="<?php the_permalink(); ?>" class="button-secondary">Read More</a>
                    </div>
                </div>
            </div>
            <?php
                endwhile;

                // Pagination
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('Previous', 'lucidica-portfolio'),
                    'next_text' => __('Next', 'lucidica-portfolio'),
                ));

            else :
                ?>
            <p><?php _e('No projects found.', 'lucidica-portfolio'); ?></p>
            <?php endif; ?>

        </div>
        <!-- <div class="button-holder">
            <a href="#" class="button-primary">Load More</a>
        </div> -->
    </div>
</section>



<?php get_footer(); ?>