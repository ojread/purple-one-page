<!-- content-section.php -->

<section id="<?php echo get_post_field('post_name', get_post()); ?>" class="<?php echo pop_get_section_class(get_the_ID()); ?>" style="<?php echo pop_get_section_style(get_the_ID()); ?>">

    <div class="section-bg" style="<?php echo pop_get_section_bg_style(get_the_ID()); ?>">

        <?php $bg_image_ids = rwmb_meta('rw_background_image', 'multiple=true'); ?>
        <?php foreach ($bg_image_ids as $image_id): ?>
            <?php $image_url = wp_get_attachment_url($image_id); ?>
            <div class="section-bg-img" style="<?php echo "background-image: url($image_url);" ?>"></div>
        <?php endforeach; ?>

    </div>

    <div class="container">
        <?php the_content(); ?>
    </div>

    <?php
        // If this section page has child pages show their content too.
        get_template_part('loop', 'subpages');
    ?>

</section>
