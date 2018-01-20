var express = require('express');
var user = require('../controllers/user');
var router = express.Router();


/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', {
    title: 'Express111111',
      title1:"hello"
  });
});

router.get('/login', function(req, res, next) {
    user.login(req, res);
});

router.get('/reg', function(req, res, next) {
    user.reg(req, res);
});

router.get('/regist', function(req, res) {
    user.regist(req, res);
});

module.exports = router;
