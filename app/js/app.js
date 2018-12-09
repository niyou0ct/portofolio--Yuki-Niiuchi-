document.addEventListener('DOMContentLoaded', function(){
  'use strict';
  Barba.Pjax.init();

  const Top = Barba.BaseView.extend({
    namespace: 'top',
    onEnterCompleted: () => {

    }
  });

  Top.init();

}, false);
