const path = require('path');

module.exports = {
    entry: './js/index.js',
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'bundle.js'
    },
    module: {
        rules: [
            {
                test: /\.(s*)css$/,
                use: [
                    "style-loader", 
                    "css-loader", 
                    "sass-loader"
                ]
            }
        ]
    }
};