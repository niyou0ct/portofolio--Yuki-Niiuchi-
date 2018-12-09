document.addEventListener('DOMContentLoaded', function() {
  'use strict';

  let glonavMove = function() {
    let $navList = document.getElementById('navList');
    let $navItems = $navList.children;

    for (let i = 0; i < $navItems.length; i++) {
      let $navItem = $navItems[i];

      $navItem.addEventListener('mouseenter', function(e) {
        let $navAnchor = this.firstChild;
        let $navRectbox = this.lastChild;

        $navRectbox.classList.add('fadeOut');
        $navRectbox.classList.remove('fadeIn');

      }, false);
      $navItem.addEventListener('mouseleave', function(e) {
        let $navAnchor = this.firstChild;
        let $navRectbox = this.lastChild;

        $navRectbox.classList.remove('fadeOut');
        $navRectbox.classList.add('fadeIn');

      }, false);

    }

  }
  glonavMove();



}, false);
