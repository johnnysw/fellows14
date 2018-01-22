var express = require('express');
var user = require('../controllers/user');
var router = express.Router();
/* GET home page. */


router.get('/login', user.login);

router.post('/login', user.checkLogin);

router.get('/reg', user.reg);

router.get('/regist', user.regist);

router.get('/',user.index);

module.exports = router;
