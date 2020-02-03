<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This footer snippet is reused in all templates. In fetches information from the `site.txt` content file
 * and from the `about` page.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

    <div class="cursor">
        <div class="cursor__inner cursor__inner--circle">
            <div class="cursor__side cursor__side--left"></div>
            <div class="cursor__side cursor__side--right"></div>
        </div>
    </div>



    <!--
    <footer class="footer">
        <a href="<?= url() ?>">&copy; <?= date('Y') ?> / <?= $site->title() ?></a>

        <?php if ($about = page('about')): ?>
        <nav class="social">
            <?php foreach ($about->social()->toStructure() as $social): ?>
            <a href="<?= $social->url() ?>"><?= $social->platform() ?></a>
            <?php endforeach ?>
        </nav>
        <?php endif ?>
    </footer>
-->
    <?= js([
    'assets/js/inner-height-ios.js',
    'assets/js/imagesloaded.pkgd.min.js',
    'assets/js/charming.min.js',
    'assets/js/TweenMax.min.js',
    'assets/js/draggabilly.pkgd.min.js',
    'assets/js/main.js',
    ]) ?>
        </body>

        </html>
