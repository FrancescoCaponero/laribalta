<?php
$gallery = $args['p_gallery'];
$style_exceptions = $args['p_gallery_style_exceptions'] ?? '';
if ($gallery) {
?>
    <div class="section__gallery__wrapper <?php print $style_exceptions?>">
    <div class="swiper swiper-container">
        <div class="swiper-wrapper">

        <?php
        foreach ($gallery as $gallery_item) {
            $image_url = printImgSrc($gallery_item, '4_3');
            ?>
            <div class="swiper-slide">
                <?php print  $image_url;  ?>
            </div>
        <?php
        }
        
        ?>
        </div>
        <div class="swiper-button-prev">
            <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" xmlns="http://www.w3.org/2000/svg"><path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z" fill="#000000" /></svg></div>
        <div class="swiper-button-next">
            <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" xmlns="http://www.w3.org/2000/svg"><path d="M256 120.768L306.432 64 768 512l-461.568 448L256 903.232 659.072 512z" fill="#000000" /></svg></div>
        </div>
    </div>
<?php } ?>