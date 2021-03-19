<?php
global $redux_demo;
?>

        <!--            redux framework start-->
        <div>
            <style>
                .typographyy {
                    color: <?php echo $redux_demo['footer-typography']['color'];?>;
                    font-style: <?php echo $redux_demo['footer-typography']['font-style'];?>;
                    font-family: <?php echo $redux_demo['footer-typography']['font-family'];?>;
                    font-size: <?php echo $redux_demo['footer-typography']['font-size'];?>;
                    line-height: <?php echo $redux_demo['footer-typography']['line-height'];?>;
                }
            </style>

            <ul class="typographyy">
                <li><a href="<?php echo $redux_demo['facebook-link']; ?>"><i></i>Facebook</a></li>
                <!--  <?php /*if ($redux_demo['linkedinn-link'] != ''): */ ?>
                <li><a href="<?php /*echo $redux_demo['linkedinn-link'];*/ ?>"><i></i>LinkedIn</a></li>
                --><?php /*endif;*/ ?>
                <li><a href="<?php echo $redux_demo['twitter-link']; ?>"><i></i>Twitter</a></li>
                <li><a href="<?php echo $redux_demo['instagram-link']; ?>"><i></i>Instagram</a></li>
            </ul>
        </div>
