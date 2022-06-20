var express = require('express');
var router = express.Router();

/* index画面から問題登録画面へ移動したquestion/newによるget */
router.get('/new', function(req, res, next) {
  res.render('new', { title: 'get-question/new _express' });
});



/* index画面から自分が作成した問題を一覧表示する画面へ移動したquestion/listによるget */
router.get('/list', function(req, res, next) {
  res.render('list', { title: 'get_question/list _express' });
});

/* 問題を編集後のedit画面からの question/listによるpost */
router.post('/list', function(req, res, next) {
  res.render('list', { title: 'post_question/list _express' });
});



/* list画面から問題編集画面へ移動したquestion/editによるget */
router.get('/edit', function(req, res, next) {
  res.render('edit', { title: 'get-question/edit _express' });
});

/* index画面からあなたの三択設定画面へ移動したquestion/sentakusetによるget */
router.get('/sentakuset', function(req, res, next) {
  res.render('sentakuset', { title: 'get-question/sentakuset_express' });
});



/* index画面かあなたの三択設定画面から問題回答画面へ移動したquestion/questionIdによるget */
router.get('/questionId', function(req, res, next) {
  res.render('questionId', { title: 'get-question/questionId _express' });
});

/* 問題回答画面から回答したquestion/questionIdによるpost */
router.post('/questionId', function(req, res, next) {
  res.render('questionId', { title: 'post-question/questionId _express' });
});


module.exports = router;
