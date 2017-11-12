const path = require('path');
module.exports = {
    entry:{
        entry: "./src/index.js"
    },
    output:{
        path:path.resolve(__dirname,'dist'),
        filename: '[name].js'
    },
    module:{

    },
    plugins:[],
    devServer:{
        contentBase: path.resolve(__dirname,'dist'),
        host:'127.0.0.1',
        port:'8081',
        compress:true
    }
}