<!-- loop-sections.php -->

<?php
// Get child pages of the current page.
$children = pop_get_child_pages($post->ID);
?>
<?php if ($children->have_posts()): ?>
    <?php while ($children->have_posts()): $children->the_post(); ?>
        <?php
            get_template_part('content', 'section');
        ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
