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
                        </section>
                    </div>
                    <button class="gridback">
              <svg width="40px" height="40px" viewbox="0 0 40 40">
    <path class="close-x" d="M 10,10 L 30,30 M 30,10 L 10,30" />
  </svg>
          </button>
                </div>
                <!-- /grid-wrap -->
            </div>
            <!-- /page -->
