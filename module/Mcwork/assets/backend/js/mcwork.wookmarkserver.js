(function ($) {
  var wookmark = undefined,
      page = 1,
      isLoading = false,
      apiURL = '/mcwork/medias/wookmark',
      lastRequestTimestamp = 0,
      fadeInDelay = 2000,
      container = '#container',
      $container = $(container),
      $loaderCircle = $('#loaderCircle'),    
      $window = $(window),
      $document = $(document);
  function onScroll(event) {
    if (!isLoading) {
      var closeToBottom = ($window.scrollTop() + $window.height() > $document.height() - 100);
      if (closeToBottom) {
        var currentTime = new Date().getTime();
        if (lastRequestTimestamp < currentTime - 1000) {
          lastRequestTimestamp = currentTime;
          loadData();
        }
      }
    }
  };
  function getWindowWidth() {
      return Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
  };
  function applyLayout($newImages) {
    $container.append($newImages);
    imagesLoaded(container, function () {
      if (wookmark === undefined) {
        wookmark = new Wookmark(container, {
          autoResize: true,        	
          offset: 20, // Optional, the distance between grid items
          itemWidth: 210, // Optional, the width of a grid item
          flexibleWidth: function () {
              return getWindowWidth() < 1024 ? '100%' : '50%';
            }          
        });
      } else {
        wookmark.initItems();
        wookmark.layout(true);
      }
      $newImages.each(function () {
        var $self = $(this);
        window.setTimeout(function () {
          $self.css('opacity', 1);
        }, Math.random() * fadeInDelay);
      });
    });
  };
  function loadData() {
    isLoading = true;
    $loaderCircle.show();

    $.ajax({
      url: apiURL,
      dataType: 'jsonp', // Set to jsonp if you use a server on a different domain and change it's setting accordingly
      data: {page: page}, // Page parameter to make sure we load new data
      success: onLoadData
    });
  };
  function onLoadData(response) {
    isLoading = false;
    $loaderCircle.hide();
    page++;
    var html = '',
        data = response.data,
        i = 0, length = data.length, image, opacity,
        $newImages;
    for (; i < length; i++) {
      image = data[i];
      html += '<li>';
      html += '<a class="loadedititem editapp" href="#" data-service="backend_client_app" data-appkey="'+image.appkey+'" data-ident="'+ image.id +'">';
      if ('imageattribute' === image.appkey){
    	  html += '<img src="'+image.preview +'" alt="'+image.title+'">';
      } else {
    	  switch (image.mediaType){
	    	  case 'application/pdf' :
	        	  html += '<p><i class="fa fa-file-pdf-o fa-5x pdf-color"></i></p>';
	              break;
	          default:
	        	  html += '<p><i class="fa fa-file fa-5x"></i></p>';
	              break;
          }
      }
      html += '</a>';
      html += '<p>'+image.title+'</p>';
      html += '</li>';
    }
    $newImages = $(html);
    if (response.message == 'No more pictures') {
      $document.off('scroll', onScroll);
    }
    applyLayout($newImages);
  };
  $document.on('scroll', onScroll);
  loadData();
})(jQuery);