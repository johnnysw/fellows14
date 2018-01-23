var express = require('express');
var router = express.Router();
var request = require('request');

/* GET users listing. */

router.get('/vue_login', function(req, res, next) {
    var name = req.query.username;
    var pwd = req.query.pwd;
    request.get("http://127.0.0.1:80/myblog/welcome/vue_login?username="+name+"&pwd="+pwd,function(error,response,body){
        req.session.loginUser = body;
        res.json(body);
    });
});

router.get('/vue_index', function(req, res, next) {
    console.log(req.session.loginUser);
    res.send(req.session.loginUser);
});

module.exports = router;
