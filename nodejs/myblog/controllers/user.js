/**
 * Created by apple on 18/1/20.
 */
var userModel = require("../models/userModel");
var blogModel = require("../models/blogModel");

exports.login =function(req,res){
    res.render('login');
};

exports.index =function(req,res){

        blogModel.getBlogs(function(blogs){
           if(blogs.length > 0){
               blogModel.getTypes(function(types){
                   res.render('index',{
                       name:req.session.loginUser,
                       blogs:blogs,
                       types:types
                   });
               });
           }else{
               res.render('error');
           }
        })




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
            res.redirect('/');
        }else{
            res.redirect('/login');
        }

    });

}

// header('Access-Control-Allow-Origin:* ');
// header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');

// var cors=require("cors");
// app.use(cors({
//     origin:['http://localhost:8080'],
//     methods:['GET','POST'],
//     alloweHeaders:['Conten-Type', 'Authorization']
// }));


