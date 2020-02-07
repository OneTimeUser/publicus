<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page. 
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`. 
 * This home template renders content from others pages, the children of the `photography` page to display a nice gallery grid.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

    <?php snippet('header') ?>



    <div class="menu-wrap">
        <div class="menu-draggable"></div>
        <nav class="menu">
            <div class="menu__item">
                <a class="menu__item-link" title="PublicUs">PublicUs</a>

                <article class="menu__item-text info">
                    <div>
                        <p>
                            <a class="menu__item-text-link" href="https://www.google.com/maps/place/PublicUs/@36.1657782,-115.132962,15z/data=!4m5!3m4!1s0x0:0x12f2b21c162e733c!8m2!3d36.1657782!4d-115.132962" target="_blank">
                                <?= page('about')->address()->kirbytextinline() ?>
                            </a>
                        </p>
                    </div>
                    <div>
                        <p>
                            <?= page('about')->phone() ?>
                        </p>
                        <p><a href="emailto:<?= page('about')->email() ?>"><?= page('about')->email() ?></a></p>
                    </div>



                    <div class="social-row">
                        <!-- Structure for Social links -->
                        <?php 
                    // using the `toStructure()` method, we create a structure collection
                    $items = page('about')->social()->toStructure();
                    // we can then loop through the entries and render the individual fields
                    foreach ($items as $item): ?>
                        <a class="menu__item-text-link <?= $item->platform() ?> ?>" href="<?= $item->url() ?>"><?= $item->platform() ?></a>
                        <?php endforeach ?>
                    </div>
                    <a class="menu__item-explore"></a>
                </article>
                <section class="menu__item-content">
                </section>
            </div>
            <div class="menu__item">
                <a class="menu__item-link" title="Menu">Menu</a>
                <article class="menu__item-text">
                    <a class="menu__item-explore">EXPLORE</a>
                </article>

            </div>
            <div class="menu__item">
                <a class="menu__item-link" title="Apply">Apply</a>
                <article class="menu__item-text">

                    <p><a class="menu__item-explore"> APPLY HERE!</a>
                    </p>
                </article>

            </div>
            <div class="menu__item">
                <a class="menu__item-link" title="Contact">Contact</a>
                <article class="menu__item-text">
                    <a class="menu__item-explore">LEAVE A MESSAGE!</a>
                </article>

            </div>
        </nav>
        <!--menu-->
    </div>
    <!--/menu-wrap-->
    </main>



    <?php snippet('footer') ?>
