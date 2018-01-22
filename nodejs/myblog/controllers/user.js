/**
 * Created by apple on 18/1/20.
 */
var userModel = require("../models/userModel");

exports.login =function(req,res){
    res.render('login');
};

exports.index =function(req,res){
    res.render('index');
};
exports.reg =function(req,res){
    res.render('regist');
}
exports.regist = function (req,res) {
    var uname = req.query.name;
    var pwd = req.query.pwd;
    var pwd2 = req.query.pwd2;

    var fn = function (results) {
        res.send(results);
    }

    userModel.regist(uname,pwd,fn);

};
exports.checkLogin = function (req,res) {
    var name = req.body.uname;
    var pwd = req.body.pwd;

    userModel.getUserByNameAndPwd(name,pwd,function(results){
        if(results.length > 0){
            req.session.loginUser = results[0];
            res.render('index',{
                name:name
            });
        }else{
            res.redirect('/login');
        }

    });

}


