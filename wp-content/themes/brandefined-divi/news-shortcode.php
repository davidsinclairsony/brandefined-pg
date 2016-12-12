<ul>
    <?php
    	$recent_posts = new WP_Query();
        $recent_posts->query('showposts=3');

        while ($recent_posts->have_posts()) : $recent_posts->the_post();
            $link = esc_url(get_the_permalink());
            $title = esc_html(get_the_title());
            $date = get_the_date('F d, Y');

            // get only a few words
            $summary = strip_tags(get_the_content());
            $letters = 80;
            if (strlen($summary) > $letters) {
                $stringCut = substr($summary, 0, $letters);
                $summary = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
            }

            $image = '';
            $color = '';

            if ( has_post_thumbnail() ) {
                $image = get_the_post_thumbnail_url();
            } else {
                $color = '#4d4d4d';
            }
        ?>
            <li><a href="<?php echo $link ?>">
                <div class="top" style="background-image: url('<?php echo $image ?>'); background-color: <?php echo $color ?>">
                    <h4><?php echo $title ?></h4>
                </div>
                <div class="bottom">
                    <h5><?php echo $date ?></h5>
                    <p><?php echo $summary ?></p>
                </div>
            </a></li>
        <?php
        endwhile;
        wp_reset_postdata();
    ?>
</ul>
