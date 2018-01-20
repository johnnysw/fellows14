/**
 * Created by apple on 18/1/20.
 */
var mysql      = require('mysql');
exports.regist = function (req,res) {
    var uname = req.query.name;
    var pwd = req.query.pwd;
    var pwd2 = req.query.pwd2;


    var connection = mysql.createConnection({
        host     : 'localhost',
        user     : 'root',
        password : '',
        database : 'myblog'
    });

    connection.connect();

    var sql = `insert into t_user(username,password) values('${uname}','${pwd}')`;
    connection.query(sql, function (error, results) {
        if (error) throw error;
        res.send(results);
        connection.end();
    });

};

exports.login =function(req,res){
    res.render('login');
};
exports.reg =function(req,res){
    res.render('regist');
}