/**
 * Created by apple on 18/1/21.
 */
var mysql      = require('mysql');

exports.query = function(sql,callback){

    var connection = mysql.createConnection({
        host     : 'localhost',
        user     : 'root',
        password : '',
        database : 'myblog'
    });

    connection.connect();

    connection.query(sql, function(error, results){
        if (error) throw error;
        callback(results);
        connection.end();
    });



}