/**
 * Created by apple on 18/1/20.
 */
var db = require('./db');
exports.getBlogs = function(callback){
    var sql = `select * from t_article`;
    db.query(sql,callback);
}

exports.getTypes = function(callback){
    var sql = `select * from t_article_type`;
    db.query(sql,callback);
}


