<?php
// PAGINA DI FALLBACK QUANDO NON TROVA NIENTE

get_header();

$pageForPost = get_option('page_for_posts') ?? '';
$pageFieldLoaded = get_fields($pageForPost) ?? '';
$pageFieldLoaded['unset_footer'] = true;

// prendiamo template di PAGE come modello di partenza
get_template_part('page', '', $pageFieldLoaded);
?>


    <div class="container-standard">
        <div class="row">
            <div class="col-12">
                <p>THIS IS INDEX</p>
            </div>
        </div>
    </div>


<?php

//get_sidebar();
get_footer();
