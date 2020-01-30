<?php

Kirby::plugin('my/page-methods', [
  'pageMethods' => [
    'item' => function() {
      $pageSlug = $this->slug();
      foreach(page('food')->$category()->toStructure() as $entry) {
        $itemTitle = $entry->dish();
        $item[] = $itemTitle . ' ';
      }
      return $item = implode("\n", $item);
    },
    'thispage'=> function() {
        return $this->slug();
    }  
  ]
]);

?>
