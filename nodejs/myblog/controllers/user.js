/**
 * Created by apple on 18/1/20.
 */
var userModel = require("../models/userModel");

exports.login =function(req,res){
    res.render('login');
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


