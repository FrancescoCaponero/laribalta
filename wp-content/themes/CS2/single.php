<?php
// PAGINA SINGOLO ARTICOLO
get_header();

$pageID = get_the_ID() ?? '';
$pageFieldLoaded = get_fields($pageID) ?? '';

// prendiamo template di PAGE come modello di partenza
$pageFieldLoaded['unset_footer'] = true;
$pageFieldLoaded['unset_hero'] = true;
$article_content = [
    'content' => get_the_content(),
    'related_posts' => get_field('article_related_posts', $pageID)
];

$pageFieldLoaded['article_content'] = $article_content;

get_template_part('page', '', $pageFieldLoaded);

get_footer();
