/**
 * Created by apple on 18/1/19.
 */

res = db.query('SELECT * from some_table');
res.output();



db.query('SELECT * from some_table', function(res) {
    res.output();
});


