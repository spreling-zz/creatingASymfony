'use strict';

var webpack = require('webpack');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var HtmlWebpackPlugin = require('html-webpack-plugin');


const path = require('path');
const _ = require('lodash');
var contextPath = path.resolve(__dirname + '\\', '..', '..');
console.log(contextPath);


module.exports = {
    default: {
        // webpack options
        context: contextPath,
        entry: {
            app: [
                '.' + path.sep + path.join('app', 'assets', 'css', 'style.scss'),
                '.' + path.sep + path.join('app', 'assets', 'js', 'script.js')
            ]
        },
        output: {
            path: path.resolve(__dirname, '..', '..', 'web', 'bundles', 'framework'),
            publicPath: '/',
            filename: 'js/[name].js',
            chunkFilename: 'js/[name].js',
            pathinfo: true
        },
        resolve: {
            extensions: ['', '.webpack.js', '.web.js', '.ts', '.js', '.scss', '.css'],
            modulesDirectories: [
                '.' + path.sep + path.join('node_modules'),
                '.' + path.sep + path.join('bower_components')
            ]
        },
        module: {
            noParse: [],
            loaders: [
                {
                    test: /\.css$/,
                    loader: ExtractTextPlugin.extract('style-loader', 'css-loader?minimize', {publicPath: 'assets/'})
                },
                {
                    test: /jquery\.js$/,
                    loader: 'expose?$!expose?jQuery'
                },
                {
                    test: /\.(png|woff|woff2|eot|ttf|svg)$/,
                    loader: 'url-loader?limit=100000'
                },
                {
                    test: /\.scss$/i,
                    loader: ExtractTextPlugin.extract('style-loader', 'css-loader?minimize!sass', {publicPath: 'assets/'})
                },
                {
                    test: /\.ts?$/,
                    loader: 'ts-loader'
                }
            ]
        },
        stats: {
            // Configure the console output
            colors: true,
            modules: true,
            reasons: false
        },
        plugins: [
            new ExtractTextPlugin('css/[name].css', {
                disable: false,
                allChunks: true
            }),
            new webpack.ProvidePlugin({
                _: 'underscore'
            })
        ],
        devtool: 'source-map',

        progress: true, // Don't show progress
        // Defaults to true

        failOnError: false, // don't report error to grunt if webpack find errors
        // Use this if webpack errors are tolerable and grunt should continue

        watch: true, // use webpacks watcher
        // You need to keep the grunt process alive

        keepalive: true, // don't finish the grunt task
        // Use this in combination with the watch option

        inline: false,  // embed the webpack-dev-server runtime into the bundle
        // Defaults to false

        hot: false // adds the HotModuleReplacementPlugin and switch the server to hot mode
        // Use this in combination with the inline option
    }
};
