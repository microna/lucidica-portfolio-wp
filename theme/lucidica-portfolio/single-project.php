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
        <?php echo do_shortcode('[contact-form-7 id="bb69b8d" title="Contact form 1"]'); ?>


    </div>
</div>



<!-- Challenges Section -->
<section class="challenges">
    <!-- <div class="challenges__ellipse">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ellipse/Ellipse 2.svg" alt="">
    </div> -->
    <div class="container">
        <div class="challenges__wrapper">
            <div class="challenges__content">
                <h2 class="challenges__title">Challenges</h2>

                <?php 
                
                $challenges = get_field('challenges_list');
                 
                $industry = get_field('industry') ?: 'Web Development';
                $launch_year = get_field('lunch_year') ?: '2025';
                $website_url = get_field('website_link') ?: '#';
                ?>

                <div class="challenges__intro">
                    <p><?php echo esc_html($intro_text); ?> </p>
                </div>

                <div class="challenges__grid">
                    <div class="challenges__items">
                        <?php if( $challenges ): ?>
                        <?php foreach( $challenges as $index => $challenge ): 
                                $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                            ?>
                        <div class="challenges__item">
                            <div class="challenges__number"><?php echo $number; ?></div>
                            <div class="challenges__text">
                                <p><?php echo esc_html($challenge['challenges_list_item']); ?> </p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="challenges__sidebar">
                        <div class="challenges__info-item">
                            <p class="challenges__info-label">Industry</p>
                            <p class="challenges__info-value"><?php echo esc_html($industry); ?></p>
                        </div>

                        <div class="challenges__info-item">
                            <p class="challenges__info-label">Launch year</p>
                            <p class="challenges__info-value"><?php echo esc_html($launch_year); ?></p>
                        </div>

                        <a href="<?php echo esc_url($website_url); ?>" target="_blank" class="button-primary">
                            <span>Go to website</span>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/arrow-forward-white.svg"
                                alt="arrow" width="16" height="16">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Design Process  Section -->
<?php 
// Check if repeater field has rows
if( have_rows('design_process_sections') ):
    $index = 0;
    $show_main_title = true;
    
    // Loop through rows
    while( have_rows('design_process_sections') ): the_row();
        
        $is_reversed = ($index % 2 == 1);
        $section_class = $is_reversed ? 'design-process-wireframes design-process-wireframes--reversed' : 'design-process-wireframes';
        
        // Get sub field values - these should match your ACF sub-field names exactly
        $item_title = get_sub_field('title') ?: '';
        $item_content = get_sub_field('content') ?: '';
        $item_image = get_sub_field('image') ?: get_template_directory_uri() . '/img/card/Wireframes & Prototyping.jpg';
?>

<section class="<?php echo esc_attr($section_class); ?>">
    <div class="container">
        <div class="design-process-wireframes__wrapper">
            <?php if( $show_main_title && $index === 0 ): ?>
            <h2 class="design-process-wireframes__title">Design Process</h2>
            <?php endif; ?>

            <div class="design-process-wireframes__content">
                <div class="design-process-wireframes__text">
                    <h3 class="design-process-wireframes__subtitle"><?php echo esc_html($item_title); ?></h3>
                    <div class="design-process-wireframes__description">
                        <?php echo esc_html($item_content); ?>
                    </div>
                </div>
                <div class="design-process-wireframes__image">
                    <img src="<?php echo esc_url($item_image); ?>" alt="<?php echo esc_attr($item_title); ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
        $index++;
    endwhile;
endif; 
?>



<!-- Technical Process Section-->
<?php 
if( have_rows('technical_process_sections') ):
    $index = 0;
    $show_main_title = true;
    
    while( have_rows('technical_process_sections') ): the_row();
        
        $is_reversed = ($index % 2 == 1);
        $section_class = $is_reversed ? 'design-process-wireframes design-process-wireframes--reversed' : 'design-process-wireframes';
        
        $item_title = get_sub_field('title') ?: '';
        $item_content = get_sub_field('content') ?: '';
        $item_image = get_sub_field('image') ?: get_template_directory_uri() . '/img/card/Wireframes & Prototyping.jpg';
?>

<section class="<?php echo esc_attr($section_class); ?>">
    <div class="container">
        <div class="design-process-wireframes__wrapper">
            <?php if( $show_main_title && $index === 0 ): ?>
            <h2 class="design-process-wireframes__title">Technical Process</h2>

            <?php endif; ?>

            <div class="design-process-wireframes__content">
                <div class="design-process-wireframes__text">
                    <h3 class="design-process-wireframes__subtitle"><?php echo esc_html($item_title); ?></h3>
                    <div class="design-process-wireframes__description">
                        <?php echo nl2br(esc_html($item_content)); ?>
                    </div>
                </div>
                <div class="design-process-wireframes__image">
                    <img src="<?php echo esc_url($item_image); ?>" alt="<?php echo esc_attr($item_title); ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
        $index++;
    endwhile;
endif; 
?>


<!-- Project overview Section -->
<?php 
if( have_rows('project_overview_sections') ):
    $index = 0;
    $show_main_title = true;
    
    while( have_rows('project_overview_sections') ): the_row();
        
        $is_reversed = ($index % 2 == 1);
        $section_class = $is_reversed ? 'design-process-wireframes design-process-wireframes--reversed' : 'design-process-wireframes';
        
        $item_title = get_sub_field('title') ?: '';
        $item_content = get_sub_field('content') ?: '';
        $item_image = get_sub_field('image') ?: get_template_directory_uri() . '/img/card/Wireframes & Prototyping.jpg';
?>

<section class="<?php echo esc_attr($section_class); ?>">
    <div class="container">
        <div class="design-process-wireframes__wrapper">
            <?php if( $show_main_title && $index === 0 ): ?>
            <h2 class="design-process-wireframes__title">Project overview</h2>
            <?php endif; ?>

            <div class="design-process-wireframes__content">
                <div class="design-process-wireframes__text">
                    <h3 class="design-process-wireframes__subtitle"><?php echo esc_html($item_title); ?></h3>
                    <div class="design-process-wireframes__description">
                        <?php echo nl2br(esc_html($item_content)); ?>
                    </div>
                </div>
                <div class="design-process-wireframes__image">
                    <img src="<?php echo esc_url($item_image); ?>" alt="<?php echo esc_attr($item_title); ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
        $index++;
    endwhile;
endif; 
?>



<!-- Conclusion Section -->
<section class="conclusion">

    <div class="conclusion__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-single.svg" alt="Logo">
    </div>
    <div class="container">
        <div class="conclusion__wrapper">
            <h2 class="conclusion__title">Conclusion</h2>

            <?php 
            $conclusion_intro = get_field('conclusion_text') ?: '';
            
            $conclusion_items = get_field('conclusion_list');
            
            $conclusion_outro = get_field('conclusion_outro') ?: '';
            

            ?>

            <div class="conclusion__content">
                <p class="conclusion__intro"><?php echo esc_html($conclusion_intro); ?></p>

                <div class="conclusion__items">
                    <?php foreach( $conclusion_items as $item ): ?>
                    <div class="conclusion__item">
                        <div class="conclusion__icon">


                            <img src="<?php echo esc_url($item['icon']); ?>"
                                alt="<?php echo esc_attr($item['text']); ?>">
                        </div>
                        <p class="conclusion__text"><?php echo esc_html($item['text']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>

                <p class="conclusion__outro"><?php echo esc_html($conclusion_outro); ?></p>
            </div>
        </div>
    </div>
</section>


<!-- CTA Section - Want One? -->
<section class="cta-want-one">
    <div class="container">
        <div class="cta-want-one__wrapper">
            <h2 class="cta-want-one__title">Want One?</h2>
            <a href="<?php echo get_field('cta_button_link') ?: 'https://calendly.com/valentyna-mostipan-lucidica/30min'; ?>"
                class="button-primary">
                <span><?php echo get_field('cta_button_text') ?: 'Quick free consultation'; ?></span>
                <img src="<?php echo get_template_directory_uri(); ?>/img/arrow-forward-white.svg" alt="arrow"
                    width="16" height="16">
            </a>
        </div>
    </div>
</section>


<?php get_footer(); ?>