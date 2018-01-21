var express = require('express');
var router = express.Router();

/* GET users listing. */
router.get('/', function(req, res, next) {
  res.send('respond with a resource');
  res.render('index',{
    name:'aaa'
  });
});

router.post('/aaa', function(req, res, next) {
    res.send('respond with a resource');
});

module.exports = router;
