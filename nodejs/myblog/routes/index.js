var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', {
    title: 'Express111111',
      title1:"hello"
  });
});

router.get('/login', function(req, res, next) {
    res.render('login');
});

router.post('/login', function(req, res, next) {
    var uname = req.body.uname;
    var pwd = req.body.pwd;

    if(uname == 'lisi' && pwd=='1234'){
        res.render('index',{
            name:uname
        });
    }
});

module.exports = router;
