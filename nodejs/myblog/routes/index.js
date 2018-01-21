var express = require('express');
var user = require('../controllers/user');
var router = express.Router();
/* GET home page. */


router.get('/login', user.login);

router.get('/reg', user.reg);

router.get('/regist', user.regist);

module.exports = router;
