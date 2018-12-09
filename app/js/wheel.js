$(function(){
  'use strict';

  function works(){
    let $inner = $('.inner'),
        $imgList = $('.imgList'),
        $imgItems = $imgList.find('.imgItem'),

        itemHeight = $imgItems.height(),

        totalItem = $imgItems.length,
        currentIndex = 0,

        counter = 0,
        velocity = 0,
        timer = null;

    $inner.css({height: itemHeight + 'px'});
    $imgItems.hide();
    $imgItems.eq(currentIndex).show();


    function slide(){
      let nextIndex = currentIndex + 1 % totalItem;

      $imgItems.eq(currentIndex).animate({
        top: -150 + '%'
      }, 500, function(){
        $imgItems.eq(currentIndex).css({top: 100 + '%'});
        $imgItems.eq(currentIndex).show();
        $imgItems.eq(currentIndex).animate({
          top: 0 + '%'
        }, 500);
      });

      currentIndex = nextIndex;

      if(nextIndex === totalItem){
        currentIndex = 0;
      }
      console.log(currentIndex);
    }
    // setInterval(slide, 10000);

    let mousewheelevent = 'onwheel' in document ? 'wheel' : 'onmousewheel' in document ? 'mousewheel' : 'DOMMouseScroll';
    $inner.on(mousewheelevent,function(e){
      e.preventDefault();
      var delta = e.originalEvent.deltaY ? -(e.originalEvent.deltaY) : e.originalEvent.wheelDelta ? e.originalEvent.wheelDelta : -(e.originalEvent.detail);
      if( delta < 0 ){
          velocity += 1;
      }else if( delta > 0 ){
        velocity -= 1;
      }


      // startAnimation();
    });

    function startAnimation(){
      if( !timer ){
        timer = setInterval(animateSequence, 1000 / 30);
      }
    }

    function stopAnimation(){
      clearInterval( timer );
      timer = null;
    }

    function animateSequence(){
      let nextIndex;

      velocity *= 0.9;

      if( -0.00001 < velocity && velocity < 0.00001 ){
          stopAnimation();

      }else{
          counter = ( counter + velocity ) % totalItem;
      }

      nextIndex = Math.floor( counter );

            console.log(nextIndex);

      if( currentIndex !== nextIndex ){
          $imgItems.eq(nextIndex).show();
          $imgItems.eq(currentIndex).hide();

          currentIndex = nextIndex;

          // console.log(currentIndex);
      }
    }

  }
  works();

});
