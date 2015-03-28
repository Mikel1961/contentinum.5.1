(function ($){
  var $tiles = $('#tiles'),
      $handler = $('li', $tiles),
      $main = $('#main'),
      $window = $(window),
      $document = $(document),
      options = {
        autoResize: true, // This will auto-update the layout when the browser window is resized.
        container: $main, // Optional, used for some extra CSS styling
        offset: 20, // Optional, the distance between grid items
        itemWidth: 210 // Optional, the width of a grid item
      };

  // Reinitializes the wookmark handler after all images have loaded
  function applyLayout() {
    $tiles.imagesLoaded(function() {
      // Destroy the old handler
      if ($handler.wookmarkInstance) {
        $handler.wookmarkInstance.clear();
      }

      // Create a new layout handler.
      $handler = $('li', $tiles);
      $handler.wookmark(options);
    });
  }



  // Call the layout function for the first time
  applyLayout();

})(jQuery);