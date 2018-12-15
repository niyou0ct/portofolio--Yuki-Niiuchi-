document.addEventListener('DOMContentLoaded', function(){
  'use strict';
  // Barba.Pjax.init();
  //
  // const Top = Barba.BaseView.extend({
  //   namespace: 'top',
  //   onEnterCompleted: () => {
  //
  //   }
  // });
  //
  // Top.init();

  // 現在と同じページのリンクをクリックした場合、リロードをしない設定
// リロードしたい場合は削除
// var links = document.querySelectorAll('a[href]');
// var cbk = function(e) {
//   if(e.currentTarget.href === window.location.href) {
//     e.preventDefault();
//     e.stopPropagation();
//   }
// };
// for(var i = 0; i < links.length; i++) {
//   links[i].addEventListener('click', cbk);
// }

// 新しいページが準備できたときにしたい処理
Barba.Dispatcher.on('newPageReady', function(currentStatus, oldStatus, container, newPageRawHTML) {

  if ( Barba.HistoryManager.history.length === 1 ) {  // ファーストビュー
    return; // この時に更新は必要ないです
  }

  // メタデータをリフレッシュ
  var head = document.head;
  var newPageRawHead = newPageRawHTML.match(/<head[^>]*>([\s\S.]*)<\/head>/i)[0];
  var newPageHead = document.createElement('head');
  newPageHead.innerHTML = newPageRawHead;
  var removeHeadTags = [
    "meta[name='keywords']"
    ,"meta[name='description']"
    ,"meta[property^='fb']"
    ,"meta[property^='og']"
    ,"meta[name^='twitter']"
    ,"meta[itemprop]"
    ,"link[itemprop]"
    ,"link[rel='prev']"
    ,"link[rel='next']"
    ,"link[rel='canonical']"
  ].join(',');
  var headTags = head.querySelectorAll(removeHeadTags)
  for(var i = 0; i < headTags.length; i++ ){
      head.removeChild(headTags[i]);
  }
  var newHeadTags = newPageHead.querySelectorAll(removeHeadTags)
  for(var i = 0; i < newHeadTags.length; i++ ){
      head.appendChild(newHeadTags[i]);
  }

  // Google Analyticsにヒットを送信
  ga('send', 'pageview', location.pathname);

  // document.wiriteを含む外部スクリプトを動かす
  var scripttag = document.querySelectorAll('script');
  // scriptそれぞれに処理
  scripttag.forEach(function(script, i) {
    getWritten(script.src, function(html){
      var div = document.createElement('div');
      div.className = 'inrjs';
      div.innerHTML = html;
      script.after(div);
    });
  });

}); // End Dispatcher

// ページ遷移トランジション
var FadeTransition = Barba.BaseTransition.extend({
  start: function() {

    // ローディングが終わるとすぐ古いページをフェードアウトさせて、新しいページをフェードイン
    Promise
      .all([this.newContainerLoading, this.fadeOut()])
      .then(this.fadeIn.bind(this));
  },

  fadeOut: function() {
    return $(this.oldContainer).animate({ opacity: 0 }, { duration: 150, easing: 'swing', }).promise();
  },

  fadeIn: function() {
    // ページトップに移動（これがないとスクロールしたところのまま画面遷移する）
    // jQueryで書く場合は $(document).scrollTop(0);
    document.body.scrollTop = 0;

    var _this = this;

    // newContainerはnewContainerLoadingを解決した後に利用できる
    var $el = $(this.newContainer);

    // 古いコンテナ
    $(this.oldContainer).hide();

    // 新たに読み込まれるbarba-containerの初期設定
    // visiblityはデフォルトhiddenなのでvisibleに変える
    $el.css({
      visibility : 'visible',
      opacity : 0
    });

    $el.animate({ opacity: 1 }, 200, function() {
      // 遷移が終了したら.done()
      // .done()は自動的にDOMから古いコンテナを削除する
      _this.done();
    });
  }
});

// Barbaに作成した遷移処理を指定
Barba.Pjax.getTransition = function() {
  return FadeTransition;
};

// barbajsをON にする
// PrefetchをON にする
$().ready(function(){
   Barba.Pjax.start();
   Barba.Prefetch.init();
});

// ページ読み込み時にdocument.writeが書かれている外部スクリプトは
// 読み込まれないので、iframe上に一時的にwriteしてコールバックを受け取る
function getWritten(fileName, callback) {
  var $iframe = $("<iframe hidden\/>");
  // iframe が DOM 上に存在しないとうまくいかないので一時的に出力する
  $iframe.appendTo("body");
  var frameDocument = $iframe[0].contentWindow.document;
  var scriptTag = "<script src=\"" + fileName + "\"><\/script>";
  frameDocument.open();
  // frame 内での window.setResult に結果受信用関数を作成する
  $iframe[0].contentWindow.setResult = function(html) {
    // 親フレーム上から用済みの iframe を除去する
    $iframe.remove();
    // 取得した文字列には scriptTag が含まれているので削除してコールバックに渡す
    callback(html.replace(scriptTag, ""));
  };
  frameDocument.write(
    "<div id=\"area-to-write\">" +
    // div タグ内に scriptTag を貼る
    scriptTag +
    "<\/div>" +
    "<script>" +
    // div タグ内に出力された文字列を setResult() に渡す
    "setResult(document.querySelector(\"#area-to-write\").innerHTML);" +
    "<\/script>"
  );
  frameDocument.close();
}

}, false);
