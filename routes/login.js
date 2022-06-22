'use strict';
const express = require('express');
const router = express.Router();

router.get('/', (req, res, next) => {
  res.render('login', { user: req.user , title:'get-login _express' });
});

module.exports = router;