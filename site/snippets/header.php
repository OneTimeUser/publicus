<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>

    <!doctype html>
    <html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

        <!-- The title tag we show the title of our site and the title of the current page -->
        <title>
            <?= $site->title() ?> |
                <?= $page->title() ?>
        </title>
        <meta name="description" content="PublicUs (pub-li-cus) is a canteen-style, neighborhood restaurant and coffeebar located in the Fremont East District of Downtown Las Vegas" />
        <meta name="keywords" content="coffee, events, food, market, artisans, downtown, Las Vegas" />
        <meta name="author" content="PublicUs" />
        <link rel="shortcut icon" href="favicon.ico">
        <?= css(['assets/css/index.css']) ?>
            <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
            <script>
                document.documentElement.className = "js";
                var supportsCssVars = function() {
                    var e, t = document.createElement("style");
                    return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e
                };
                supportsCssVars() || alert("Please view this in a modern browser that supports CSS Variables.");

            </script>

    </head>

    <body class="loading">
        <div class="active-bg"></div>
        <main>
            <!--        need to create a system where we take all images that have been entered, shuffle them, and then fill up the available slots with them-->

            <?php $homeImages = $site->images(); 
            
            ?>
            <div class="page page--preview">
                <div class="grid-wrap">
                    <div class="grid grid--layout-1">

                        <?php 
                        $i=1;
                        while ($i <= 9): ?>
                        <div class="grid__item-wrap">
                            <div class="grid__item" style="background-image: url(<?= $homeImages->shuffle()->first()->url(); ?>)"></div>
                        </div>
                        <?php $i++ ?>
                        <?php endwhile; ?>
                        <section class="menu__item-content content-1"></section>
                    </div>
                    <div class="grid grid--layout-2">

                        <?php 
                        $i=1;
                        while ($i <= 8): ?>
                        <div class="grid__item-wrap">
                            <div class="grid__item" style="background-image: url(<?= $homeImages->shuffle()->first()->url(); ?>)"></div>
                        </div>
                        <?php $i++ ?>
                        <?php endwhile; ?>
                        <section class="menu__item-content content-2">
                            <article class="menu__menu">
                                <section class="menu__menu-cat">
                                    <div>
                                    <?php foreach ($foodcategories as $category): ?>
                                    <h2 class="titles title-<?= $category ?><?php if ($category == 'BREKKIE'):?> active-menu-cat <?php endif ?>" data-attribute="<?= strtolower($category) ?>">
                                        <?= $category ?>
                                    </h2>
                                    <?php endforeach ?>
                                    
                                    <h2 class="titles title-DRINKS" data-attribute="drinks">DRINKS</h2>
                                    </div>
                                    <div>
                                    <div class="menu__menu-options">
                                        <ul>
                                            <li><span>gf</span> - gluten free</li> 
                                            <li><span>nf</span> - nut free</li>
                                            <li><span>df</span> - dairy free</li>
                                            <li><span>v</span> - vegetarian</li>
                                            <li><span>vv</span> - vegan</li>
                                            <li><span>o</span> - option available</li>
                                        </ul>
                                    </div>
                                    <p class="menu__menu-raw">
                                        *Consuming raw or undercooked meat, poultry, seafood or eggs may increase your risk of food borne illness.<br/>
                                        **No modifications
                                    </p>
                                    </div>



                                </section>

                                <section class="menu__menu-items">
                                    <?php foreach ($foodcategories as $category): ?>

                                    <section id="<?= strtolower($category) ?>" class="">
                                        <?php foreach (page('food')->$category()->toStructure() as $item): ?>
                                        <?php if ($item->unpublished()->isEmpty()): ?>
                                        <div class="menu__menu-item">
                                            <h4 class="titles item-name">
                                                <?= $item->dish() ?>
                                                <?php if ($item->disclaimer()->isNotEmpty()): ?>
                                                *<?php endif ?>  -
                                                     <?= $item->price() ?>
                                            </h4>
                                            <p class="item-desc">
                                                <?php if ($item->description()->isNotEmpty()): ?>
                                                <?= $item->description() ?>
                                                    <?php endif ?>
                                                    <span class="light item-tag"> <?php if ($item->tags()->isNotEmpty()): ?>
                                                (<?= $item->tags() ?>)
                                                    <?php endif ?> </span>
                                            </p>
                                            <p class="item-add">
                                                <?php if ($item->addons()->isNotEmpty()): ?>
                                                <?= $item->addons()->kirbytextinline() ?>
                                                    <?php endif ?>
                                            </p>
                                        </div>
                                        <?php endif ?>
                                        <?php endforeach ?>

                                    </section>
                                    <?php endforeach ?>

                                    <section id="drinks" class="">
                                    <?php foreach ($drinkcategories as $drinkcategory): 
                            ?>
                                    <section id="<?= strtolower($drinkcategory) ?>">
                                        <h3 class="titles">
                                            <?= $drinkcategory ?>

                                        </h3>
                                        <?php 
                                $drinkcategory = preg_replace('/\s+/', '', $drinkcategory);
    foreach (page('drink')->$drinkcategory()->toStructure() as $item): ?>
                                        <?php if ($item->unpublished() ->isFalse()): ?>
                                        <div class="menu__menu-item">
                                            <h4 class="titles item-name">
                                                <?= $item->dish() ?><?php if ($item->disclaimer()->isNotEmpty()): ?>
                                                **<?php endif ?> -
                                                    <?= $item->price() ?>
                                            </h4>
                                            <p class="item-desc">
                                                <?php if ($item->description()->isNotEmpty()): ?>
                                                <?= $item->description() ?>
                                                    <?php endif ?>
                                                    <span class="light item-tag"> <?php if ($item->tags()->isNotEmpty()): ?>
                                                (<?= $item->tags() ?>)
                                                    <?php endif ?> </span>
                                            </p>
                                            <p class="item-add">
                                                <?php if ($item->addons()->isNotEmpty()): ?>
                                                <?= $item->addons() ?>
                                                    <?php endif ?>
                                            </p>
                                        </div>
                                        <?php endif ?>
                                        <?php endforeach ?>
                                    </section>
                                    <?php endforeach ?>
                                </section>

                                </section>
                            </article>
                        </section>
                    </div>
                    <div class="grid grid--layout-3">
                        <?php 
                        $i=1;
                        while ($i <= 9): ?>
                        <div class="grid__item-wrap">
                            <div class="grid__item" style="background-image: url(<?= $homeImages->shuffle()->first()->url() ?>)"></div>
                        </div>
                        <?php $i++ ?>
                        <?php endwhile; ?>
                        <section class="menu__item-content content-3">
                            <?php snippet('formbuilder',['pg' => 'application-form']); ?>
                        </section>
                    </div>
                    <div class="grid grid--layout-4">
                        <?php 
                        $i=1;
                        while ($i <= 8): ?>
                        <div class="grid__item-wrap">
                            <div class="grid__item" style="background-image: url(<?= $homeImages->shuffle()->first()->url() ?>)"></div>
                        </div>
                        <?php $i++ ?>
                        <?php endwhile; ?>
                        <section class="menu__item-content content-4">
<!--                           -->
                        </section>
                    </div>
                    <button class="gridback">
<!--             <svg width="40px" height="40px" viewBox="0 0 40 40"><path d="M1.469 6.75l-.719.719 7.938 6.937.718-.719L1.47 6.75zM8.594.531L.75 7.375l.688.688L9.28 1.218 8.594.53zM1.406 6.938v1h24.75v-1H1.406z" fill="#de6565"/></svg> -->
              <svg width="40px" height="40px" viewbox="0 0 40 40">
    <path class="close-x" d="M 10,10 L 30,30 M 30,10 L 10,30" />
  </svg>
          </button>
                </div>
                <!-- /grid-wrap -->
            </div>
            <!-- /page -->

            <!--
    <header class="header">
         In this link we call `$site->url()` to create a link back to the homepage 
        <a class="logo" href="<?= $site->url() ?>"><?= $site->title() ?></a>

        <nav id="menu" class="menu">
            <?php 
        // In the menu, we only fetch listed pages, i.e. the pages that have a prepended number in their foldername
        // We do not want to display links to unlisted `error`, `home`, or `sandbox` pages
        // More about page status: https://getkirby.com/docs/reference/panel/blueprints/page#statuses
        foreach ($site->children()->listed() as $item): ?>
            <?= $item->title()->link() ?>
                <?php endforeach ?>
        </nav>
    </header>
-->
