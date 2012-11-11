/*global module:false*/
module.exports = function (grunt) {
  'use strict';

  grunt.initConfig({
    sass:{
      dist:{
        options: {
          style : 'compressed'
        },
        files:{
          'css/custom.css':'css/scss/custom.scss'
        }
      },
      options:{
        'compass':true
      }
    },
    coffee:{
      compile:{
        files:{
          'js/scripts/*.js':'app/coffee/*.coffee'
        }
      }
    },
    watch:{
      coffee:{
        files:['app/coffee/*'],
        tasks:'coffee'
      },
      sass:{
        files:['css/scss/*'],
        tasks:'sass'
      }
    }
  });

// Load necessary plugins
  grunt.loadNpmTasks('grunt-contrib-sass');
//  grunt.loadNpmTasks('grunt-contrib-coffee');

  grunt.registerTask('default', 'sass');

};