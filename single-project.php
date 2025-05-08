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


<section class="project-item">
    <div class="container">
        <h2 class="hero__title">Design Process</h2>

        <?php 
        // Debug: Check if ACF function exists
        if( !function_exists('get_field') ) {
            echo '<p>ACF is not active</p>';
        }
        
        // Debug: Check if the repeater field exists
        if( get_field('design_process') === null ) {
            echo '<p>Field "design_process" not found</p>';
        }
        
        $rows = get_field('design_process');
        if( have_rows('design_process') ): ?>
        <?php while( have_rows('design_process') ): the_row(); 
                $image = get_sub_field('desing_process_image');
                $title = get_sub_field('desing_process_title');
                $text = get_sub_field('desing_process_text');
            ?>
        <div class="project-item__content">
            <div class="project-item__image">
                <?php if($image): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php else: ?>
                <p>No image found</p>
                <?php endif; ?>
            </div>
            <div class="project-item__text">
                <?php if($title): ?>
                <h3 class="project-item__title title-underline"><?php echo $title; ?></h3>
                <?php else: ?>
                <p>No title found</p>
                <?php endif; ?>
                <?php if($text): ?>
                <div class="project-item__description">
                    <?php echo $text; ?>
                </div>
                <?php else: ?>
                <p>No text found</p>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
        <p>No design process items found. Check your field group settings.</p>
        <?php endif; ?>

    </div>
</section>

<!-- <section class="project-item">
    <div class="container">
        <h2 class="hero__title">Design Process</h2>
        <div class="project-item__content">
            <div class="project-item__image">
                <img src="<?php echo get_template_directory_uri(); ?>/img/projects/1.jpg" alt="Project Image" />
            </div>
            <div class="project-item__text">
                <h3 class="project-item__title title-underline">Research & Analysis</h3>
                <p class="project-item__description">
                    Before designing the new website, we conducted a detailed competitor
                    analysis and gathered user feedback. The main issues of the previous
                    design included:
                </p>
                <ul>
                    <li>
                        - Complicated navigation – users struggled to find the services they
                        needed.
                    </li>
                    <li>
                        - No mobile responsiveness – the site did not function properly on
                        smartphones.
                    </li>
                    <li>
                        - Outdated UI – the visual style no longer met modern standards.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="project-item">
    <div class="container">
        <div class="project-item__content project-item--reverse">
            <div class="project-item__image">
                <img src="<?php echo get_template_directory_uri(); ?>/img/projects/2.jpg" alt="Project Image" />
            </div>
            <div class="project-item__text">
                <h3 class="project-item__title title-underline">
                    Wireframes & Prototyping
                </h3>
                <p class="project-item__description">
                    Before moving to the final design, we created wireframes to structure
                    the layout and define key user flows. This step ensured an intuitive
                    and efficient user experience by focusing on functionality before
                    aesthetics:
                </p>
                <ul>
                    <li>
                        - Low-Fidelity Wireframes – Early sketches to map out the structure
                        and user interactions.
                    </li>
                    <li>
                        - High-Fidelity Wireframes – Detailed layouts incorporating key UI
                        elements.
                    </li>
                    <li>
                        - Interactive Prototypes – Clickable mockups to test usability and
                        gather feedback before development.
                    </li>
                </ul>
                <p class="project-item__description">
                    By refining the design through wireframing and prototyping, we
                    minimized revisions and ensured a seamless transition from concept to
                    a fully functional product.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="project-item">
    <div class="container">
        <div class="project-item__content">
            <div class="project-item__image">
                <img src="<?php echo get_template_directory_uri(); ?>/img/projects/5.jpg" alt="Project Image" />
            </div>
            <div class="project-item__text">
                <h3 class="project-item__title title-underline">UI KIT Design</h3>
                <p class="project-item__description">
                    To ensure consistency and scalability, I developed a comprehensive UI
                    Kit that serves as the foundation for the entire design system. It
                    includes essential components, typography, colors, buttons, icons, and
                    form elements, ensuring a cohesive visual language across all pages:
                </p>
                <ul>
                    <li>
                        - Typography & Color Palette – Defines the brand's tone and
                        accessibility.
                    </li>
                    <li>
                        - Buttons & Forms – Designed for usability and responsiveness.
                    </li>
                    <li>- Icons & Components – Ensuring clarity and consistency.</li>
                    <li>
                        - Spacing & Grid System – Optimized for a seamless user experience.
                    </li>
                </ul>
                <p class="project-item__description">
                    The UI Kit streamlines the design process, improves collaboration, and
                    maintains a unified aesthetic throughout the project.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="project-item">
    <div class="container">
        <h2 class="hero__title">Design Process</h2>
        <div class="project-item__content project-item--reverse">
            <div class="project-item__image">
                <img src="<?php echo get_template_directory_uri(); ?>/img/projects/1.jpg" alt="Project Image" />
            </div>
            <div class="project-item__text">
                <h3 class="project-item__title title-underline">Main page</h3>
                <p class="project-item__description">
                    The homepage immediately communicates the company's expertise,
                    showcasing Lucidica's strong technical knowledge and commitment to
                    innovation. We utilized bold visuals and modern design elements to
                    reflect their innovative approach. The layout is user-friendly, making
                    it easy for visitors to navigate and understand the services offered.
                    Additionally, we focused on a clean and professional aesthetic that
                    aligns with the company's identity, ensuring a seamless experience for
                    users across all devices.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="project-item">
    <div class="container">
        <div class="project-item__content">
            <div class="project-item__image">
                <img src="<?php echo get_template_directory_uri(); ?>/img/projects/5.jpg" alt="Project Image" />
            </div>
            <div class="project-item__text">
                <h3 class="project-item__title title-underline">Services Page</h3>
                <p class="project-item__description">
                    The Services page is designed to clearly showcase the range of
                    services offered by the company. It highlights the company's expertise
                    in each service category, ensuring that visitors can easily understand
                    what is available. Bold typography and concise descriptions are used
                    to guide the user through the offerings, with each service section
                    accompanied by intuitive icons and visuals to enhance understanding.
                    The layout is organized to allow quick access to key information, and
                    the design is responsive, ensuring a smooth browsing experience on any
                    device. The page maintains a professional yet approachable aesthetic,
                    reinforcing the company's credibility while making it easy for users
                    to explore and find solutions tailored to their needs.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="project-item">
    <div class="container">
        <div class="project-item__content project-item--reverse">
            <div class="project-item__image">
                <img src="<?php echo get_template_directory_uri(); ?>/img/projects/5.jpg" alt="Project Image" />
            </div>
            <div class="project-item__text">
                <h3 class="project-item__title title-underline">About Us Page</h3>
                <p class="project-item__description">
                    The About Us page is designed to provide visitors with a clear
                    understanding of the company's values, mission, and history. We aimed
                    to create a connection by highlighting the team's expertise and
                    commitment to delivering innovative solutions. The design incorporates
                    engaging visuals, including team photos and key milestones, to
                    humanize the brand and convey the company's story. The layout is
                    structured to lead users through the company's journey, from its
                    founding to its present-day achievements. With a focus on transparency
                    and trust, the page creates a warm and professional atmosphere that
                    encourages visitors to learn more about the company's culture and
                    vision, while ensuring a seamless experience across all devices.
                </p>
            </div>
        </div>
    </div>
</section>


<section class="project-item">
    <div class="container">
        <div class="project-item__content">
            <div class="project-item__image">
                <img src="<?php echo get_template_directory_uri(); ?>/img/projects/5.jpg" alt="Project Image" />
            </div>
            <div class="project-item__text">
                <h3 class="project-item__title title-underline">Contact Page</h3>
                <p class="project-item__description">
                    The About Us page is designed to provide visitors with a clear
                    understanding of the company's values, mission, and history. We aimed
                    to create a connection by highlighting the team's expertise and
                    commitment to delivering innovative solutions. The design incorporates
                    engaging visuals, including team photos and key milestones, to
                    humanize the brand and convey the company's story. The layout is
                    structured to lead users through the company's journey, from its
                    founding to its present-day achievements. With a focus on transparency
                    and trust, the page creates a warm and professional atmosphere that
                    encourages visitors to learn more about the company's culture and
                    vision, while ensuring a seamless experience across all devices.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="conclusions">
    <div class="container">
        <h2 class="hero__title">Conclusions</h2>
        <div class="conclusions__content">
            <p class="conclusions__description">The redesign delivered measurable results, demonstrating its
                significant
                value for the client:</p>
            <div class="conslusion__content-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/trending_up.svg" alt="arrow-forward">
                <p>
                    Increased Website Traffic: A 40% increase in traffic, driven by improved user experience and
                    SEO,
                    led to longer visits and deeper engagement across the site.
                </p>
            </div>
            <div class="conslusion__content-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/supervisor_account.svg" alt=" account">
                <p>
                    Higher Conversion Rates: A 25% boost in conversions, with visitors more easily navigating
                    the site
                    and engaging with services, resulting in more inquiries.
                </p>
            </div>
            <div class="conslusion__content-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/key.svg" alt="key">
                <p>
                    Enhanced User Engagement: User-friendly features and a visually appealing design led to
                    better
                    engagement, with positive feedback on ease of use and overall experience.
                </p>
            </div>
            <div class="conslusion__content-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/card_travel.svg" alt="card">
                <p>
                    Stronger Brand Identity: The new design reinforced the client's innovative, professional
                    image,
                    boosting brand recognition and positioning them as an industry leader.
                </p>
            </div>
            <div class="conslusion__content-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/img/stay_primary_portrait.svg" alt="portairtt">
                <p>
                    Improved Mobile Experience: Mobile traffic increased by 30%, thanks to a responsive design
                    that
                    ensures a smooth experience on all devices.
                </p>
            </div>
        </div>
</section>

<div class="cta">
    <div class="container">
        <h2 class="hero__title">Want One?</h2>
        <a href="" class="button-primary modal__btn">Quick free consultation</a>
    </div>
</div> -->

<?php get_footer(); ?>