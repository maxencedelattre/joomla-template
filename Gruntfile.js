/*!
 * ETD Solutions's Gruntfile
 * http://etd-solutions.com
 * Copyright 2017 ETD Solutions
 * Licensed under Apache-2.0
 */

module.exports = function(grunt) {

    // Configuration du projet
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                mangle: true,
                compress: true,
                beautify: false,
                sourceMap: false,
                preserveComments: false,
                banner: '/**!\n\t* @package     <%= pkg.name %>\n\t*\n\t* @version     <%= pkg.version %>\n\t* @copyright   Copyright (C) <%= grunt.template.today("yyyy") %> ETD Solutions. Tous droits réservés.\n\t* @license     Apache-2.0 \n\t* @author      ETD Solutions http://etd-solutions.com\n*/\n',
                screwIE8: true,
                quoteStyle: 0
            },
            template: {
                src: 'js/app.js',
                dest: 'js/app.min.js'
            }
        },
        less: {
            options: {
                optimization: 10,
                sourceMap: false
            },
            template: {
                options: {
                    paths: [
                        'less',
                        'node_modules/bootstrap/less',
                        'node_modules/font-awesome/less'
                    ]
                },
                files: {
                    'css/template.css': 'less/template.less'
                }
            }
        },
        sass: {
            options: {
                precision: 6,
                sourceComments: false,
                sourceMap: false,
                outputStyle: 'expanded'
            },
            dist: {
                options: {
                    includePaths: [
                        'scss',
                        'node_modules/bootstrap/scss'
                    ]
                },
                files: {
                    'css/template.css': 'scss/template.scss'
                }
            }
        },
        postcss: {
            options: {
                map: false,
                processors: [
                    require('postcss-flexbugs-fixes'), // add vendor prefixes
                    require('autoprefixer')({
                        browsers: [
                            //
                            // Official browser support policy:
                            // http://v4-alpha.getbootstrap.com/getting-started/browsers-devices/#supported-browsers
                            //
                            'Chrome >= 35', // Exact version number here is kinda arbitrary
                            // Rather than using Autoprefixer's native "Firefox ESR" version specifier string,
                            // we deliberately hardcode the number. This is to avoid unwittingly severely breaking the previous ESR in the event that:
                            // (a) we happen to ship a new Bootstrap release soon after the release of a new ESR,
                            //     such that folks haven't yet had a reasonable amount of time to upgrade; and
                            // (b) the new ESR has unprefixed CSS properties/values whose absence would severely break webpages
                            //     (e.g. `box-sizing`, as opposed to `background: linear-gradient(...)`).
                            //     Since they've been unprefixed, Autoprefixer will stop prefixing them,
                            //     thus causing them to not work in the previous ESR (where the prefixes were required).
                            'Firefox >= 38', // Current Firefox Extended Support Release (ESR); https://www.mozilla.org/en-US/firefox/organizations/faq/
                            // Note: Edge versions in Autoprefixer & Can I Use refer to the EdgeHTML rendering engine version,
                            // NOT the Edge app version shown in Edge's "About" screen.
                            // For example, at the time of writing, Edge 20 on an up-to-date system uses EdgeHTML 12.
                            // See also https://github.com/Fyrd/caniuse/issues/1928
                            'Edge >= 12',
                            'Explorer >= 9',
                            // Out of leniency, we prefix these 1 version further back than the official policy.
                            'iOS >= 8',
                            'Safari >= 8',
                            // The following remain NOT officially supported, but we're lenient and include their prefixes to avoid severely breaking in them.
                            'Android 2.3',
                            'Android >= 4',
                            'Opera >= 12'
                        ]
                    })
                ]
            },
            template: {
                src: 'css/template.css'
            }
        },
        cssmin: {
            options: {
                keepSpecialComments: false,
                sourceMap: false,
                advanced: false
            },
            template: {
                options: {
                    compatibility: 'ie9'
                },
                files: {
                    'css/template.min.css': 'css/template.css'
                }
            }
        },
        concat: {
            options: {
                separator: '\n'
            },
            template: {
                src: ['node_modules/@fortawesome/fontawesome/index.js', 'node_modules/@fortawesome/fontawesome-free-brands/index.js', 'node_modules/@fortawesome/fontawesome-free-solid/index.js', 'node_modules/@fortawesome/fontawesome-free-regular/index.js' , 'node_modules/@fortawesome/fontawesome-pro-light/index.js', 'node_modules/@fortawesome/fontawesome-pro-solid/index.js', 'node_modules/@fortawesome/fontawesome-pro-regular/index.js', 'node_modules/popper.js/dist/umd/popper.js', 'js/custom.js'], // la source
                dest: 'js/app.js' // la destination finale
            }
        },
        watch: {
            js: {
                files: ['js/**/*.js','!js/**/*.min.js'],
                tasks: ['uglify']
            },
            less: {
                files: ['less/**/*.less'],
                tasks: ['css']
            },
            sass: {
                files: ['scss/**/*.scss'],
                tasks: ['css']
            }
        }
    });

    // On charge le plugin qui donne la tâche "uglify".
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // On charge le plugin qui donne la tâche "less".
    grunt.loadNpmTasks('grunt-contrib-less');

    // On charge le plugin qui donne la tâche "sass".
    grunt.loadNpmTasks('grunt-sass');

    // On charge le plugin qui donne la tâche "postcss".
    grunt.loadNpmTasks('grunt-postcss');

    // On charge le plugin qui donne la tâche "cssmin".
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    //On charge le plugin qui donne la tâche "concat".
    grunt.loadNpmTasks('grunt-contrib-concat');

    // On charge le plugin qui donne la tâche "sync".
    grunt.loadNpmTasks('grunt-sync');

    // On charge le plugin qui donne la tâche "watch".
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Construit le JS
    grunt.registerTask('js', ['concat', 'uglify']);

    // Construit le CSS
    grunt.registerTask('css', ['sass', 'postcss', 'cssmin']);

    // Copie les fichiers vendor de Composer
    //grunt.registerTask('vendor', ['sync']);

    // Les tâches par défaut.
    grunt.registerTask('default', ['js', 'css']);

};
