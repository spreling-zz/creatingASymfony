/**
 * Created by HarmJacob on 25-04-16.
 */
module.exports = function (grunt) {
    var path = require('path');
    require('load-grunt-config')(grunt, {
        // path to task.js files, defaults to grunt dir
        configPath: path.join(process.cwd(), 'resources/tasks'),

        // auto grunt.initConfig
        init: true,

        // data passed into config.  Can use with <%= test %>
        data: {
            test: false
        },
        // can optionally pass options to load-grunt-tasks.
        // If you set to false, it will disable auto loading tasks.
        loadGruntTasks: {
            pattern: 'grunt-*'
        }
    });
};
