const path = require('path');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");

module.exports = {
    mode: "production",
    entry: ['./js/src/app.js', './css/src/app.scss'],
    output: {
        filename: './js/build/app.min.js',
        path: path.resolve(__dirname)
    },
    module: {
        rules: [
            {
                test: /\.js$/, exclude: /node_modules/,
                use: {
                    loader: "babel-loader", 
                    options: { presets: ['@babel/preset-env'] } 
                }
            },
            {
                test: /\.(sass|scss)$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: "sass-loader",
                        options: {
                            additionalData: `@import "global.scss";`
                        }
                    }
                ]
            } 
        ]
    },
    resolve: {
        alias: {}
    },
    plugins: [new MiniCssExtractPlugin({ filename: './css/build/main.min.css' }) ],
    optimization: {
        minimizer: [
            new UglifyJSPlugin({
                cache: true,
                parallel: true
            }), 
            new OptimizeCSSAssetsPlugin({})
        ]
    }
};