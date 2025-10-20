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
        <?php echo do_shortcode('[contact-form-7 id="bb69b8d" title="Contact form 1"]'); ?>


    </div>
</div>


<section class="project-item">
    <div class="container">


        <?php 
        // Check if the flexible content field has data
        if( have_rows('design_process') ): 
            echo '<h2 class="hero__title">Design Process</h2>';            
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
                // Get ACF fields with fallback values
                $intro_text = get_field('challenges_intro') ?: "We were tasked with building this project entirely from scratch. The goal was to create a professional online presence that reflects personality, values, and services.";
                
                $challenges = get_field('challenges_list');
                if( !$challenges ) {
                    // Fallback challenges data
                    $challenges = array(
                        array('text' => 'There was no logo, color palette, or visual direction to build upon. We developed a complete brand identity from the ground up — including logo design, typography, and a color system that reflects energy, professionalism, and approachability.'),
                        array('text' => 'The client didn\'t have a website or platform to showcase their work, philosophy, or achievements. We created a structured, content-driven website that introduces them, highlights their services, and builds trust with potential clients.'),
                        array('text' => 'The challenge was to present multiple aspects of the client\'s career in a clear and cohesive way. We designed a user-friendly layout with focused messaging and intuitive navigation to guide visitors through their story and offerings.'),
                        array('text' => 'The site needed to be flexible enough to grow with the client\'s career — adding new services, media, or booking features. We built a scalable structure with modular components and CMS integration, allowing easy updates and future expansion.')
                    );
                }
                
                $industry = get_field('industry') ?: 'Web Development';
                $launch_year = get_field('launch_year') ?: '2025';
                $website_url = get_field('website_url') ?: '#';
                ?>

                <div class="challenges__intro">
                    <p><?php echo esc_html($intro_text); ?></p>
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
                                <p><?php echo esc_html($challenge['text']); ?></p>
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

                        <a href="<?php echo esc_url($website_url); ?>" target="_blank" class="challenges__button">
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


<!-- Wireframes & Prototyping Section -->
<section class="design-process-wireframes">
    <!-- <div class="design-process-wireframes__ellipse">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ellipse/Ellipse 2.svg" alt="">
    </div> -->
    <div class="design-process-wireframes__underline">
        <img src="<?php echo get_template_directory_uri(); ?>/img/blue-underline.svg" alt="">
    </div>
    <div class="container">
        <div class="design-process-wireframes__wrapper">
            <h2 class="design-process-wireframes__title">Design Process</h2>

            <?php 
            // Get ACF fields with fallback values
            $wireframe_title = get_field('wireframe_section_title') ?: 'Wireframes & Prototyping';
            $wireframe_content = get_field('wireframe_section_content') ?: "Before diving into the final design, we developed wireframes to define the site's structure and user flows. This step was crucial in shaping a clear and purposeful experience.

• Low-Fidelity Wireframes – initial sketches to outline key sections and navigation paths.
• High-Fidelity Wireframes – detailed layouts incorporating visual hierarchy and UI components.
• Interactive Prototypes – clickable mockups used to test usability and gather feedback before development.

This process helped us validate ideas early, reduce revisions, and ensure a smooth transition from concept to launch.";
            $wireframe_image = get_field('wireframe_section_image') ?: get_template_directory_uri() . '/img/card/Wireframes & Prototyping.jpg';
            ?>

            <div class="design-process-wireframes__content">
                <div class="design-process-wireframes__text">
                    <h3 class="design-process-wireframes__subtitle"><?php echo esc_html($wireframe_title); ?></h3>
                    <div class="design-process-wireframes__description">
                        <?php echo nl2br(esc_html($wireframe_content)); ?>
                    </div>
                </div>
                <div class="design-process-wireframes__image">
                    <img src="<?php echo esc_url($wireframe_image); ?>" alt="<?php echo esc_attr($wireframe_title); ?>">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Design Process Section (Reversed) -->
<section class="design-process-wireframes design-process-wireframes--reversed">
    <!-- <div class="design-process-wireframes__ellipse design-process-wireframes__ellipse--reversed">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ellipse/Ellipse 2.svg" alt="">
    </div> -->
    <div class="container">
        <div class="design-process-wireframes__wrapper">
            <?php 
            // Get ACF fields with fallback values for reversed section
            $reversed_title = get_field('design_section_title_2') ?: 'Visual Design & Branding';
            $reversed_content = get_field('design_section_content_2') ?: "Once the wireframes were approved, we moved into the visual design phase. This is where the brand truly came to life through carefully crafted design elements.

• Color Palette – selected a modern color scheme that reflects the brand's personality and values.
• Typography System – chose font pairings that ensure readability and visual hierarchy across all devices.
• UI Components – designed reusable elements like buttons, forms, and cards for consistency.
• Responsive Layouts – ensured the design adapts seamlessly from desktop to mobile.

The result is a cohesive visual identity that not only looks stunning but also enhances the user experience and strengthens brand recognition.";
            $reversed_image = get_field('design_section_image_2') ?: get_template_directory_uri() . '/img/card/Wireframes & Prototyping.jpg';
            ?>

            <div class="design-process-wireframes__content">

                <div class="design-process-wireframes__text">
                    <h3 class="design-process-wireframes__subtitle"><?php echo esc_html($reversed_title); ?></h3>
                    <div class="design-process-wireframes__description">
                        <?php echo nl2br(esc_html($reversed_content)); ?>
                    </div>
                </div>
                <div class="design-process-wireframes__image">
                    <img src="<?php echo esc_url($reversed_image); ?>" alt="<?php echo esc_attr($reversed_title); ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Conclusion Section -->
<section class="conclusion">
    <!-- <div class="conclusion__ellipse conclusion__ellipse--1">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ellipse/Ellipse 2.svg" alt="">
    </div>
    <div class="conclusion__ellipse conclusion__ellipse--2">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ellipse/Ellipse 1.svg" alt="">
    </div> -->
    <div class="conclusion__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-single.svg" alt="Logo">
    </div>
    <div class="container">
        <div class="conclusion__wrapper">
            <h2 class="conclusion__title">Conclusion</h2>

            <?php 
            // Get ACF fields with fallback values
            $conclusion_intro = get_field('conclusion_intro') ?: 'The redesign delivered measurable results, demonstrating its significant value for the client:';
            
            $conclusion_items = get_field('conclusion_items');
            if( !$conclusion_items ) {
                // Fallback conclusion items
                $conclusion_items = array(
                    array(
                        'icon' => 'trending_up.svg',
                        'text' => 'Increased Website Traffic: 40% increase in traffic, driven by improved user experience and SEO, led to longer visits and deeper engagement across the site.'
                    ),
                    array(
                        'icon' => 'supervisor_account.svg',
                        'text' => 'Higher Conversion Rates: 25% boost in conversions, with visitors more easily navigating the site and engaging with services, resulting in more inquiries.'
                    ),
                    array(
                        'icon' => 'key.svg',
                        'text' => 'Enhanced User Engagement: user-friendly features and a visually appealing design led to better engagement, with positive feedback on ease of use and overall experience.'
                    ),
                    array(
                        'icon' => 'card_travel.svg',
                        'text' => 'Stronger Brand Identity: the new design reinforced the client\'s innovative, professional image, boosting brand recognition and positioning them as an industry leader.'
                    ),
                    array(
                        'icon' => 'stay_primary_portrait.svg',
                        'text' => 'Improved Mobile Experience: mobile traffic increased by 30%, thanks to a responsive design that ensures a smooth experience on all devices.'
                    )
                );
            }
            
            $conclusion_outro = get_field('conclusion_outro') ?: 'In conclusion, the redesign enhanced the client\'s digital presence, with significant improvements in traffic, engagement, conversions, and brand identity, paving the way for continued success.';
            ?>

            <div class="conclusion__content">
                <p class="conclusion__intro"><?php echo esc_html($conclusion_intro); ?></p>

                <div class="conclusion__items">
                    <?php foreach( $conclusion_items as $item ): ?>
                    <div class="conclusion__item">
                        <div class="conclusion__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo esc_attr($item['icon']); ?>"
                                alt="">
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



<?php get_footer(); ?>