<?php

$hero_image_hero_over = $args['page_image_hero_over'] ?? null;
$hero_video_bg = $args['page_video_hero'] ?? null;

$hero_image_bg = !empty($args['page_image_hero']) && is_array($args['page_image_hero']) ? $args['page_image_hero']['sizes']['16_9'] : null;

$hero_image_bg_mobile = !empty($args['page_image_hero_mobile']) && is_array($args['page_image_hero_mobile'])
    ? $args['page_image_hero_mobile']['sizes']['3_4']
    : $hero_image_bg;

$page_hero_style_exceptions = $args['page_hero_style_exceptions'] ?? '';
$page_hero_title = !empty($args['page_hero_title']) ? str_replace(['<p>', '</p>'], '', $args['page_hero_title']) : get_the_title();

if (empty($page_hero_title) && empty($args['page_subtitle']) && empty($args['page_intro']) && empty($args['page_cta']) && !$hero_video_bg && !$hero_image_bg && !$hero_image_bg_mobile) {
    return;
}

$hero_page_class = (empty($hero_image_bg) && empty($hero_video_bg)) ? 'remove-background' : '';

?>

<div class="hero__page__wrapper <?php print $hero_page_class . ' ' . $page_hero_style_exceptions ?>">
    <?php if (!empty($hero_image_bg)) { ?>
        <div class="hero-background-wrapper">
            <picture>
                <source media="(max-width: 767px)" srcset="<?php echo $hero_image_bg_mobile; ?>" rel="preload">
                <source media="(min-width: 768px)" srcset="<?php echo $hero_image_bg; ?>" rel="preload">
                <img src="<?php echo $hero_image_bg; ?>" alt="hero-background" rel="preload">
            </picture>
        </div>
    <?php } ?>
    <?php if ($hero_video_bg) { ?>
        <video autoplay muted loop width="100%" height="100%" class="hero__page__video">
            <source src="<?php print $hero_video_bg['url'] ?>" type="video/mp4">
        </video>
    <?php } ?>
    <div class="container-standard">
        <div class="row row--content">
            <div class="col-12">
                <div class="hero__page">
                    <div class="hero__page__text">
                        <?php if (!empty($page_hero_title)) { ?>
                            <h1 class="hero__page__text__title">
                                <?php print $page_hero_title ?>
                            </h1>
                        <?php } ?>
                        <?php if (!empty($args['page_subtitle'])) { ?>
                            <div class="hero__page__text__subtitle">
                                <?php print $args['page_subtitle'] ?>
                            </div>
                        <?php } ?>
                        <?php if (!empty($args['page_intro'])) { ?>
                            <div class="hero__page__text__intro">
                                <?php print $args['page_intro'] ?>
                            </div>
                        <?php } ?>
                        <?php if (!empty($args['page_cta'])) { ?>
                            <div class="hero__page__text__cta">
                                <?php print printCta($args['page_cta']) ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if(!empty($hero_image_hero_over)){ ?>
                <div class="col-12 col-md-4 col-xl-6">
                    <?php print printImgSrc($hero_image_hero_over, '3_4'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
