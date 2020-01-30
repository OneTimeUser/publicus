<?php

/**
 * Controllers allow you to separate the logic of your templates from your markup.
 * This is especially useful for complex logic, but also in general to keep your templates clean.
 * In this example, we define the `$gallery` variable which is passed to the template
 * More about controllers: https://getkirby.com/docs/guide/templates/controllers
 */

return function () {
    $drinkcategories = [
        'COFFEE BAR',
        'PUBLICUS SPECIALS',
        'EXTRAS',
        'ICED TEA',
        'HOT TEA',
        'DRINKS',
        'COLD PRESSED JUICE',
        'WINE',
        'BEER'
    ];
    
    $foodcategories = [
        'BREKKIE',
        'TOASTS',
        'SALADS',
        'SOUPS',
        'BOWLS',
        'SANDWICHES',
        'SIDES'
    ];
    return [
        'drinkcategories' => $drinkcategories,
        'foodcategories' => $foodcategories
    ];
};
?>
