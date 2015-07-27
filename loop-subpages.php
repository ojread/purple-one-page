<!-- loop-subpages.php -->

<?php
// Get child pages of the current page and show as a carousel.
$children = pop_get_child_pages($post->ID);
?>
<?php if ($children->have_posts()): ?>

    <?php $carousel_id = "carousel-$post->ID"; ?>

    <div id="<?php echo $carousel_id; ?>" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <?php $active = 'active'; ?>

            <?php while ($children->have_posts()): $children->the_post(); ?>
                <div class="item <?php echo $active; ?>">
                    <div class="container" style="padding: 50px 10%;">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php $active = ''; ?>
            <?php endwhile; ?>

            <!-- Controls -->
            <a class="left carousel-control" href="#<?php echo $carousel_id; ?>" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#<?php echo $carousel_id; ?>" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div> <!-- .carousel-inner -->

    </div> <!-- .carousel -->

<?php endif; ?>
<?php wp_reset_query(); ?>
