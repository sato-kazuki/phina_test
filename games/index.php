<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>農場経営シミュレーションゲーム(仮)</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="">
</head>
<body>
<header>
    <a href=".">農場経営シミュレーションゲーム(仮)</a>
</header>

<article>
<section>

</section>
</article>

<footer>
    <hr>
    <a href="https/crafterlife.site">戻る</a>
</footer>
</html>


<script src='library/phina.js'></script>
<script>

phina.globalize();

//素材
var ASSETS = {
  image: {
    bg1: 'img/bg1.png',
    chara1: 'img/chara1.png',
    btn1:'img/btn1.png'
  },
};
var SCREEN_WIDTH  = 750;              // スクリーン幅
var SCREEN_HEIGHT = 1334;              // スクリーン高さ
var SPEED = 4;

phina.define("MainScene", {
  // 継承
  superClass: 'DisplayScene',

  // 初期化
  init: function(options) {
    // super init
    this.superInit(options);

    // 背景
    this.bg = Sprite("bg1").addChildTo(this);
    this.bg.origin.set(0, 0); // 左上基準に変更

    // プレイヤー
    this.player = Sprite('chara1', 64, 64).addChildTo(this);
    this.player.setPosition(400, 400);
    this.player.frameIndex = 0;

    this.btn = Sprite("btn1").addChildTo(this);
    this.btn.setPosition(600, 1200);
    this.btn.frameIndex = 0;
    // クリック有効化
    this.btn.setInteractive(true, "circle");


  },

  // 更新
  update: function(app) {
    var p = app.pointer;

    this.btn.onpointstart = function () {
      this.x -= 100;
    };


    if (p.getPointing()) {
      var diffx = this.player.x - p.x;
      var diffy = this.player.y - p.y;
      if (Math.abs(diffx) > SPEED) {
        // 右に移動
        if (diffx < 0) {
          this.player.x += SPEED;
          this.player.scaleX = -1;
        }
        // 左に移動
        else {
          this.player.x -= SPEED;
          this.player.scaleX = 1;
        }
        // フレームアニメーション
        if (app.frame % 4 === 0) {
          this.player.frameIndex = (this.player.frameIndex === 12) ? 13:12;
        }
      }if(Math.abs(diffy) > SPEED){
        // 下に移動
        if (diffy < 0) {
          this.player.y += SPEED;
          this.player.scaleY = -1;
        }
        // 上に移動
        else {
          this.player.y -= SPEED;
          this.player.scaleY = 1;
        }

        // フレームアニメーション
        if (app.frame % 4 === 0) {
          this.player.frameIndex = (this.player.frameIndex === 12) ? 13:12;
        }
      }
    }
    else {
      // 待機
      this.player.frameIndex = 0;
    }
  }
});

phina.define("MainScene", {
  // 継承
  superClass: 'DisplayScene',

  // 初期化
  init: function(options) {
    // super init
    this.superInit(options);
  },
  update: function(app) {
    var p = app.pointer;
  }

});


phina.main(function() {
  // アプリケーションを生成
  var app = GameApp({
    startLabel: 'main',   // MainScene から開始
    width: SCREEN_WIDTH,  // 画面幅
    height: SCREEN_HEIGHT,// 画面高さ
    assets: ASSETS,       // アセット読み込み
  });

  //app.enableStats();

  // 実行
  app.run();
});

</script>