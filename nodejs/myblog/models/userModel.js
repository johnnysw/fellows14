/**
 * Created by apple on 18/1/20.
 */
var mysql      = require('mysql');
var connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : '',
    database : 'myblog'
});

exports.regist = function(uname,pwd,callback){

    connection.connect();
    var sql = `insert into t_user(username,password) values('${uname}','${pwd}')`;

    connection.query(sql, function(error, results){
        if (error) throw error;
        callback(results);
        connection.end();
    });



}

