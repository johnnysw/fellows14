const path = require('path');
module.exports = {
    entry:{
        entry: "./src/index.js"
    },
    output:{
        path:path.resolve(__dirname,'dist'),
        filename: '[name].js'
    }
}