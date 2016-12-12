<ul>
    <?php
    	$recent_posts = wp_get_recent_posts();

        for($i = 0; $i < 3; $i++) {
            $recent = $recent_posts[$i];

            if(empty($recent)) {
                break;
            }

            echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
        }

    	wp_reset_query();
    ?>
</ul>
