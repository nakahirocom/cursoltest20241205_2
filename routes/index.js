var express = require('express');
var router = express.Router();

/* ログイン最初のindex画面 localhost/ によるget */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'get-/ _express', user: req.user });
});


/* 問題を登録時のindex画面 localhost/によるpost */
router.post('/', function(req, res, next) {
  res.render('index', { title: 'post-/ _express' });
});

module.exports = router;
