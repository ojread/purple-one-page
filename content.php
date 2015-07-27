<!-- content.php -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>

</article>
