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
            <h1 class="hero__title fade-in-delay-1">Our Expertise in Action</h1>

            <p class="hero__text fade-in-delay-3">
                Every project is a chance to craft something unique and memorable. We
                go beyond tasks -analyzing needs and turning ideas into impactful
                solutions.
            </p>

            <a href="" class="button-primary modal__btn">Contact Us</a>
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

<section class="projects">
    <div class="container">
        <div class="projects__content portfolio__content">
            <h2 class="projects__content-title portfolio__content-title">
                Proud
                Projects -
            </h2>
            <span class="projects__content-text portfolio__content-text">clients trust Lucidica, and we<br />
                value each one of them.</span>
        </div>
    </div>
    <div class="swiper projects__slider">
        <div class="swiper-wrapper">
            <?php
            $args = array(
                'post_type' => 'project',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            
            $projects_query = new WP_Query($args);
            
            if ($projects_query->have_posts()) :
                while ($projects_query->have_posts()) : $projects_query->the_post();
                    // Get the featured image
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    if (!$thumbnail) {
                        $thumbnail = get_template_directory_uri() . '/img/project-1.jpg'; // Fallback image
                    }
            ?>
            <div class="swiper-slide projects__slider-item">
                <img class="projects__slider-img" src="<?php echo esc_url($thumbnail); ?>"
                    alt="<?php echo esc_attr(get_the_title()); ?>" />
                <h5 class="projects__slider-title"><?php echo esc_html(get_the_title()); ?></h5>
                <p class="projects__slider-text">
                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                </p>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
    <div class="container">
        <a href="<?php echo home_url(); ?>/projects" class="button-primary">Explore our work</a>
    </div>
</section>

<section class="impact">
    <div class="container">
        <div class="impact__wrapper">
            <div class="impact__blocks">
                <div class="impact__blocks-item">
                    <h6 class="impact__blocks-item__title">25+</h6>
                    <p class="impact__blocks-item__text">
                        Years of seccsefull collaborations worldwide - helping businesses
                        scale and grow
                    </p>
                </div>
                <div class="impact__blocks-item">
                    <h6 class="impact__blocks-item__title">100%</h6>
                    <p class="impact__blocks-item__text">
                        Individual approach to each project – we create solutions tailored
                        to your business goals.
                    </p>
                </div>
                <div class="impact__blocks-item">
                    <h6 class="impact__blocks-item__title">90%</h6>
                    <p class="impact__blocks-item__text">
                        Of clients become our friends and return to us again – based on
                        trust and quality.
                    </p>
                </div>
                <div class="impact__blocks-item">
                    <h6 class="impact__blocks-item__title">50+</h6>
                    <p class="impact__blocks-item__text">
                        Completed web projects – from landing pages to complex platforms
                        with deep integration.
                    </p>
                </div>
            </div>

            <div class="impact__content">
                <h2 class="impact__content-title">Proven Impact</h2>
                <p class="impact__content-text">
                    Our portfolio highlights real-world cases that demonstrate how
                    creativity, strategy, and attention to detail drive success.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="testimonials">
    <div class="container">
        <div class="testimonials__content portfolio__content">
            <h2 class="testimonials__content-title portfolio__content-title">
                Proud
                Projects -
            </h2>
            <span class="testimonials__content-text portfolio__content-text">clients trust Lucidica, and we<br />
                value each one of them.</span>
        </div>
    </div>
    <div class="swiper testimonials__slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide testimonials__slider-item">
                <div class="testimonials__wrapper">
                    <div class="testimonials__slider-content">
                        <div class="testimonials__slider-stars">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                        </div>
                        <div class="testimonials__slider-subtitle">Business Owner </div>
                        <div class="testimonials__slider-title">
                            Rasheed Ogunlaru
                        </div>
                    </div>
                    <div class="testimonials__slider-content--image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/Rasheed.jpg" alt="">
                    </div>
                </div>
                <div class="testimonials__slider-text">
                    "Lucidica understands small businesses from one person start-ups to growing SMEs.
                    It's this combined with their passion for IT and their personable, friendly team that make them
                    stand out. I've used their services from IT support..."
                </div>
                <a href="https://www.cloudtango.net/providers/4321/lucidica#comments" class="button-secondary">Read
                    More</a>
            </div>


            <div class="swiper-slide testimonials__slider-item">
                <div class="testimonials__wrapper">
                    <div class="testimonials__slider-content">
                        <div class="testimonials__slider-stars">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                        </div>
                        <div class="testimonials__slider-subtitle">GREET THERAPIES</div>
                        <div class="testimonials__slider-title">
                            WILLIAM ANDREWS
                        </div>
                    </div>
                    <div class="testimonials__slider-content--image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/user-img.jpg" alt="">
                    </div>
                </div>
                <div class="testimonials__slider-text">
                    "The seminar gave me an appetite to improve my IT facilities and website. The afternoon was full of
                    interesting facts and information that I found was all relevant to running my business. It was well
                    worth the money and I'd recommend these seminars to anyone looking to make the most of their
                    business."
                </div>
                <a href="https://www.cloudtango.net/providers/4321/lucidica#comments" class="button-secondary">Read
                    More</a>
            </div>
            <div class="swiper-slide testimonials__slider-item">
                <div class="testimonials__wrapper">
                    <div class="testimonials__slider-content">
                        <div class="testimonials__slider-stars">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                        </div>
                        <div class="testimonials__slider-subtitle">Daks Simpson LTD
                        </div>
                        <div class="testimonials__slider-title">
                            Vicki French
                        </div>
                    </div>
                    <div class="testimonials__slider-content--image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/daks.png" alt="">
                    </div>
                </div>
                <div class=" testimonials__slider-text">
                    "We highly recommend Lucidica. We do not have in house IT and I have to say the response time,
                    the
                    assistance, the support and professionalism from all the team at Lucida are excellent. All
                    issues
                    are dealt with very quickly. I cannot fault Lucidica at all."
                </div>
                <a href="https://www.cloudtango.net/providers/4321/lucidica#comments" class="button-secondary">Read
                    More</a>
            </div>
            <div class="swiper-slide testimonials__slider-item">
                <div class="testimonials__wrapper">
                    <div class="testimonials__slider-content">
                        <div class="testimonials__slider-stars">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                        </div>
                        <div class="testimonials__slider-subtitle">eatbigfish</div>
                        <div class="testimonials__slider-title">
                            Rosie Dean, Office Manager
                        </div>
                    </div>
                    <div class="testimonials__slider-content--image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/rosie.jpg" alt="">
                    </div>
                </div>
                <div class="testimonials__slider-text">
                    "We have used Lucidica as our IT support for several years and are very happy with the service
                    they
                    provide. Not only do they handle our day to day enquires efficiently, Lucidica have helped us
                    with
                    large tasks such as changing document management platforms and a major IT security update."
                </div>
                <a href="https://www.cloudtango.net/providers/4321/lucidica#comments" class="button-secondary">Read
                    More</a>
            </div>
            <div class="swiper-slide testimonials__slider-item">
                <div class="testimonials__wrapper">
                    <div class="testimonials__slider-content">
                        <div class="testimonials__slider-stars">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                        </div>
                        <div class="testimonials__slider-subtitle">GIAN Consulting</div>
                        <div class="testimonials__slider-title">
                            Ranbir Toor, Director
                        </div>
                    </div>
                    <div class="testimonials__slider-content--image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/ranbir.jpeg" alt="">
                    </div>
                </div>
                <div class="testimonials__slider-text">
                    "To me, they are an extension of my own business and it's what I value most. I can't recommend
                    their
                    people and services more highly."
                </div>
                <a href="https://www.cloudtango.net/providers/4321/lucidica#comments" class="button-secondary">Read
                    More</a>
            </div>
            <div class="swiper-slide testimonials__slider-item">
                <div class="testimonials__wrapper">
                    <div class="testimonials__slider-content">
                        <div class="testimonials__slider-stars">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                        </div>
                        <div class="testimonials__slider-subtitle">PlusX</div>
                        <div class="testimonials__slider-title">
                            Matt Hunter, CEO
                        </div>
                    </div>
                    <div class="testimonials__slider-content--image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/matt_hunter.jpg" alt="">
                    </div>
                </div>
                <div class="testimonials__slider-text">
                    "Lucidica helped Plus X to combine data from various cloud platforms and migrate safely to
                    Microsoft365. Microsoft Teams, in particular, has proved extremely effective in helping our team
                    to
                    collaborate across our various locations."
                </div>
                <a href="https://www.cloudtango.net/providers/4321/lucidica#comments" class="button-secondary">Read
                    More</a>
            </div>
            <div class="swiper-slide testimonials__slider-item">
                <div class="testimonials__wrapper">
                    <div class="testimonials__slider-content">
                        <div class="testimonials__slider-stars">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/star.svg" alt="star" />
                        </div>
                        <div class="testimonials__slider-subtitle">Williams Mining</div>
                        <div class="testimonials__slider-title">
                            Derek Williams, Director
                        </div>
                    </div>
                    <div class="testimonials__slider-content--image">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/derek.jpeg" alt="">
                    </div>
                </div>
                <div class="testimonials__slider-text">
                    "I've been a customer of Lucidica for nearly five years and have found them to be consistent,
                    patient and efficient. They've supported my business with every type of IT enquiry and have been
                    reliable in their delivery of service. I've been impressed by their aftercare consultative
                    approach."
                </div>
                <a href="https://www.cloudtango.net/providers/4321/lucidica#comments" class="button-secondary">Read
                    More</a>
            </div>
        </div>


</section>




<?php get_footer(); ?>