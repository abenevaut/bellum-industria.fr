'use strict';

module.exports = function(grunt) {
    var config = {
        version: '4.1.0',
        core: 'core',
        demo: 'demo',
        docs: 'docs',
        barebone: 'barebone',
        bundle: 'bundle',
        plugins: 'plugins',
        boilerplates: 'boilerplates',
        dist: 'dist/pages',
        live: 'live',
        meteorLess: 'bundle/demo/meteor/imports/ui/stylesheets',
        parent: '../pages/pages-admin',
        widgets_src: 'widgets',
        // deployment paths
        staging: '../www/html/staging/pages/dashboard/',
        production: '../www/html/pages/dashboard/',
        current_production: '../www/html/pages/dashboard/',
        widgets: '../www/html/pages/dashboard/widgets/',
    };
    grunt.initConfig({
        config: config,
        pkg: grunt.file.readJSON('package.json'),
        // Clean before a new build task
        clean: {
            options: { force: true },
            dist: "<%= config.dist %>",
            staging: "<%= config.staging %>",
            demo: ["<%= config.demo %>/pages", "<%= config.demo %>/assets/plugins"],
            barebone: ["<%= config.barebone %>/pages", "<%= config.barebone %>/assets/plugins"],
            bundle: "bundle",
            live: ["<%= config.live %>"],
            meteor: ["<%= config.meteorLess %>"],
            rm_widget:["<%= config.bundle %>/demo/html/widget.html"]
        },
        // Watch for less files changes
        watch: {
            less: {
                files: '<%= config.core %>/less/**/*.less',
                tasks: 'less'
            }
        },
        // Compiles default and other theme scss files
        sass: {
            default: {
                 files: [{
                    expand: true,
                    cwd: '<%= config.core %>/scss',
                    src: ['*.scss'],
                    dest: '<%= config.dist %>/css',
                    ext: '.css'
                  }]
            },
            themes: {
                 files: [{
                    expand: true,
                    flatten: true,
                    cwd: '<%= config.core %>/scss/themes',
                    src: ['**/*.scss'],
                    dest: '<%= config.dist %>/css/themes',
                    ext: '.css'
                  }]
            }
        },
        // Compile default and other theme less files
        less: {
            default: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true
                },
                files: {
                    '<%= config.dist %>/css/pages.css': '<%= config.core %>/less/pages.less'
                }
            },
            default_rtl: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'direction': 'rtl'
                    }
                },
                files: {
                    '<%= config.dist %>/css/pages.rtl.css': '<%= config.core %>/less/pages.less'
                }
            },
            simple: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'theme-name': 'simple',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/simple.css': '<%= config.core %>/less/pages.less'
                }
            },
            simple_rtl: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'direction': 'rtl',
                        'theme-name': 'simple',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/simple.rtl.css': '<%= config.core %>/less/pages.less'
                }
            },
            abstract: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'theme-name': 'abstract',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/abstract.css': '<%= config.core %>/less/pages.less'
                }
            },
            abstract_rtl: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'direction': 'rtl',
                        'theme-name': 'abstract',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/abstract.rtl.css': '<%= config.core %>/less/pages.less'
                }
            },
            calendar: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'theme-name': 'calendar',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/calendar.css': '<%= config.core %>/less/pages.less'
                }
            },
            calendar_rtl: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'direction': 'rtl',
                        'theme-name': 'calendar',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/calendar.rtl.css': '<%= config.core %>/less/pages.less'
                }
            },
            corporate: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'theme-name': 'corporate',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/corporate.css': '<%= config.core %>/less/pages.less'
                }
            },
            corporate_rtl: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'direction': 'rtl',
                        'theme-name': 'corporate',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/corporate.rtl.css': '<%= config.core %>/less/pages.less'
                }
            },
            retro: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'theme-name': 'retro',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/retro.css': '<%= config.core %>/less/pages.less'
                }
            },
            retro_rtl: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'direction': 'rtl',
                        'theme-name': 'retro',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/retro.rtl.css': '<%= config.core %>/less/pages.less'
                }
            },
            unlax: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'theme-name': 'unlax',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/unlax.css': '<%= config.core %>/less/pages.less'
                }
            },
            unlax_rtl: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'direction': 'rtl',
                        'theme-name': 'unlax',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/unlax.rtl.css': '<%= config.core %>/less/pages.less'
                }
            },
            vibes: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'theme-name': 'vibes',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/vibes.css': '<%= config.core %>/less/pages.less'
                }
            },
            vibes_rtl: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'direction': 'rtl',
                        'theme-name': 'vibes',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/vibes.rtl.css': '<%= config.core %>/less/pages.less'
                }
            },
            modern: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'theme-name': 'modern',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/modern.css': '<%= config.core %>/less/pages.less'
                }
            },
            modern_rtl: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'direction': 'rtl',
                        'theme-name': 'modern',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/modern.rtl.css': '<%= config.core %>/less/pages.less'
                }
            },
            light: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'theme-name': 'light',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/light.css': '<%= config.core %>/less/pages.less'
                }
            },
            light_rtl: {
                options: {
                    paths: ['<%= config.core %>/less'],
                    yuicompress: true,
                    modifyVars: {
                        'direction': 'rtl',
                        'theme-name': 'light',
                        'assets-img-url': '"../../../assets/img/"'
                    }
                },
                files: {
                    '<%= config.dist %>/css/themes/light.rtl.css': '<%= config.core %>/less/pages.less'
                }
            }
        },
        exec: {
            meteor: {
                cmd: function() {
                  return 'cd bundle/demo/; meteor create meteor';
                }
            }
        },
        // replace: {
        //     meteorLess: {
        //         src: ['<%= config.meteorLess %>/modules.import.less'],
        //         overwrite: true,
        //         replacements: [{
        //             from: '.less',
        //             to: '.import.less'
        //         }]
        //     },
        //     meteorPages: {
        //         src: ['<%= config.meteorLess %>/pages.less'],
        //         overwrite: true,
        //         replacements: [{
        //             from: '@import "mixins";',
        //             to: '@import "mixins.import.less";'
        //         }, {
        //             from: '@import "modules";',
        //             to: '@import "modules.import.less";'
        //         }, {
        //             from: '@import "modules/direction";',
        //             to: '@import "modules/direction.import.less";'
        //         }, {
        //             from: '@import "responsive";',
        //             to: '@import "responsive.import.less";'
        //         }, {
        //             from: '@import "themes/@{theme-name}/theme";',
        //             to: '@import "themes/@{theme-name}/theme.import.less";'
        //         }]
        //     },
        //     meteorTheme: {
        //         src: ['<%= config.meteorLess %>/themes/**/theme.import.less'],
        //         overwrite: true,
        //         replacements: [{
        //             from: 'var.less',
        //             to: 'var.import.less'
        //         }]
        //     },
        //     meteorVar: {
        //         src: ['<%= config.meteorLess %>/themes/**/var.import.less'],
        //         overwrite: true,
        //         replacements: [{
        //             from: '@assets-url: "../../assets";',
        //             to: '@assets-url: "../";'
        //         }]
        //     }
        // },
        copy: {
            // Copy pages core into dist
            dist: {
                files: [{
                    src: ['**/*', '!js/ui/**', '!js/ui2/**'
                    ,'!js/pages.init.js','!js/pages.jquery-wrapper.js',
                    '!js/pages.email.native.js','!js/pages.social.native.js'],
                    expand: true,
                    cwd: '<%= config.core %>/',
                    dest: '<%= config.dist %>/',
                }]
            },
            cli:{
                files: [{
                    src: ['.angular-cli.json'],
                    expand: true,
                    cwd: 'demo/angular/',
                    dest: '<%= config.bundle %>/demo/angular',
                },{
                    src: ['.angular-cli.json'],
                    expand: true,
                    cwd: 'demo/angular/',
                    dest: '<%= config.bundle %>/getting_started/angular',
                }]
            },
            // meteor: {
            //     files: [{
            //         src: ['**/*','!pages.less'],
            //         expand: true,
            //         cwd: '<%= config.core %>/less/',
            //         dest: '<%= config.meteorLess %>/',
            //         rename: function(dest, src) {
            //             return dest + src.replace('.less', '.import.less');
            //         }
            //     },{
            //         src: ['pages.min.js'],
            //         expand: true,
            //         cwd: '<%= config.dist %>/js/',
            //         dest: '<%= config.bundle %>/demo/meteor/packages/pages-core/js/',
            //     },{
            //         src: ['pages.calendar.min.js'],
            //         expand: true,
            //         cwd: '<%= config.dist %>/js/',
            //         dest: '<%= config.bundle %>/demo/meteor/packages/pages-calendar/js/',
            //     },{
            //         src: ['**/*'],
            //         expand: true,
            //         cwd: '<%= config.demo %>/meteor',
            //         dest: '<%= config.bundle %>/demo/meteor/',
            //     },{
            //         src: ['pages.less'],
            //         expand: true,
            //         cwd: '<%= config.core %>/less/',
            //         dest: '<%= config.meteorLess %>/',
            //     }
            //     ]
            // },
            staging:{
                files: [{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.bundle %>/demo',
                    dest: '<%= config.staging %>',
                }]
            },
            landing:{
                files: [{
                    src: ['**'],
                    expand: true,
                    cwd: 'landing_page/',
                    dest: '<%= config.production %>',
                }]
            },
            production:{
                files: [{
                    src: ['**'],
                    expand: true,
                    cwd: 'landing_page/',
                    dest: '<%= config.production %>',
                },{
                    src: ['docs/**'],
                    expand: true,
                    cwd: '<%= config.bundle %>',
                    dest: '<%= config.production %><%= config.version %>',
                },{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.bundle %>/docs/',
                    dest: '<%= config.production %>/<%= config.version %>/doc',
                },{
                    src: ['docs/**'],
                    expand: true,
                    cwd: '<%= config.bundle %>',
                    dest: '<%= config.current_production %><%= config.version %>',
                },{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.bundle %>/docs/',
                    dest: '<%= config.current_production %><%= config.version %>/doc',
                },{
                    src: ['docs/**'],
                    expand: true,
                    cwd: '<%= config.live %>',
                    dest: '<%= config.production %>/latest/',
                },{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.bundle %>/docs/',
                    dest: '<%= config.production %>/latest/doc',
                }]
            },
            distPages:{
                    files: [{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest: '<%= config.bundle %>/demo/html/condensed/pages/',
                },
                {
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest: '<%= config.bundle %>/demo/html/executive/pages/',
                },
                {
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest: '<%= config.bundle %>/demo/html/casual/pages/',
                },
                {
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest: '<%= config.bundle %>/demo/html/corporate/pages/',
                }]
            },
            // Copy pages and plugins demo Folder
            demo: {
                files: [{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest:'<%= config.bundle %>/getting_started/html/pages/',
                },{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest:'<%= config.bundle %>/demo/html/condensed/pages/',
                },{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest:'<%= config.bundle %>/demo/html/executive/pages/',
                },{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest:'<%= config.bundle %>/demo/html/casual/pages/',
                },{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest:'<%= config.bundle %>/demo/html/corporate/pages/',
                },{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest:'<%= config.bundle %>/demo/html/simply_white/pages/',
                }, {
                    src: ['**/*',
                    '!angular/**/*',
                    '!angular-bootstrap-nav-tree/**/*',
                    '!angular-dropzone/**/*',
                    '!angular-google-map-loader/**/*',
                    '!angular-nestable/**/*',
                    '!angular-nvd3/**/*',
                    '!angular-oc-lazyload/**/*',
                    '!angular-rickshaw/**/*',
                    '!angular-sanitize/**/*',
                    '!angular-sparkline/**/*',
                    '!angular-summernote/**/*',
                    '!angular-ui-router/**/*',
                    '!angular-ui-select/**/*',
                    '!angular-ui-util/**/*',
                    '!angular-wizard/**/*',
                    '!ng-switchery/**/*'
                    ],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest:'<%= config.bundle %>/demo/html/condensed/assets/plugins',
                },{
                    src: ['**/*',
                    '!angular/**/*',
                    '!angular-bootstrap-nav-tree/**/*',
                    '!angular-dropzone/**/*',
                    '!angular-google-map-loader/**/*',
                    '!angular-nestable/**/*',
                    '!angular-nvd3/**/*',
                    '!angular-oc-lazyload/**/*',
                    '!angular-rickshaw/**/*',
                    '!angular-sanitize/**/*',
                    '!angular-sparkline/**/*',
                    '!angular-summernote/**/*',
                    '!angular-ui-router/**/*',
                    '!angular-ui-select/**/*',
                    '!angular-ui-util/**/*',
                    '!angular-wizard/**/*',
                    '!ng-switchery/**/*'
                    ],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest:'<%= config.bundle %>/demo/html/executive/assets/plugins'
                },
                {
                    src: ['**/*',
                    '!angular/**/*',
                    '!angular-bootstrap-nav-tree/**/*',
                    '!angular-dropzone/**/*',
                    '!angular-google-map-loader/**/*',
                    '!angular-nestable/**/*',
                    '!angular-nvd3/**/*',
                    '!angular-oc-lazyload/**/*',
                    '!angular-rickshaw/**/*',
                    '!angular-sanitize/**/*',
                    '!angular-sparkline/**/*',
                    '!angular-summernote/**/*',
                    '!angular-ui-router/**/*',
                    '!angular-ui-select/**/*',
                    '!angular-ui-util/**/*',
                    '!angular-wizard/**/*',
                    '!ng-switchery/**/*'
                    ],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest:'<%= config.bundle %>/demo/html/casual/assets/plugins'
                },
                {
                    src: ['**/*',
                    '!angular/**/*',
                    '!angular-bootstrap-nav-tree/**/*',
                    '!angular-dropzone/**/*',
                    '!angular-google-map-loader/**/*',
                    '!angular-nestable/**/*',
                    '!angular-nvd3/**/*',
                    '!angular-oc-lazyload/**/*',
                    '!angular-rickshaw/**/*',
                    '!angular-sanitize/**/*',
                    '!angular-sparkline/**/*',
                    '!angular-summernote/**/*',
                    '!angular-ui-router/**/*',
                    '!angular-ui-select/**/*',
                    '!angular-ui-util/**/*',
                    '!angular-wizard/**/*',
                    '!ng-switchery/**/*'
                    ],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest:'<%= config.bundle %>/demo/html/corporate/assets/plugins'
                },{
                    src: ['**/*',
                    '!angular/**/*',
                    '!angular-bootstrap-nav-tree/**/*',
                    '!angular-dropzone/**/*',
                    '!angular-google-map-loader/**/*',
                    '!angular-nestable/**/*',
                    '!angular-nvd3/**/*',
                    '!angular-oc-lazyload/**/*',
                    '!angular-rickshaw/**/*',
                    '!angular-sanitize/**/*',
                    '!angular-sparkline/**/*',
                    '!angular-summernote/**/*',
                    '!angular-ui-router/**/*',
                    '!angular-ui-select/**/*',
                    '!angular-ui-util/**/*',
                    '!angular-wizard/**/*',
                    '!ng-switchery/**/*'
                    ],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest:'<%= config.bundle %>/demo/html/simply_white/assets/plugins'
                },
                // {
                //     src: ['assets/**/*','pages/**/*','mobile_view/**/*'],
                //     expand: true,
                //     cwd: '<%= config.docs %>',
                //     dest: '<%= config.bundle %>/docs/',
                // },
                // Copy favicons
                {
                    src: ['favicon.ico'],
                    expand: true,
                    cwd: './',
                    dest: '<%= config.bundle %>/demo/html/condensed',
                },
                {
                    src: ['favicon.ico'],
                    expand: true,
                    cwd: './',
                    dest: '<%= config.bundle %>/demo/html/casual',
                },
                {
                    src: ['favicon.ico'],
                    expand: true,
                    cwd: './',
                    dest: '<%= config.bundle %>/demo/html/executive',
                },
                {
                    src: ['favicon.ico'],
                    expand: true,
                    cwd: './',
                    dest: '<%= config.bundle %>/demo/html/corporate',
                },{
                    src: ['favicon.ico'],
                    expand: true,
                    cwd: './',
                    dest: '<%= config.bundle %>/demo/html/simply_white',
                },
                {
                    src: ['favicon.ico'],
                    expand: true,
                    cwd: './',
                    dest: '<%= config.bundle %>/getting_started/html',
                }]
            },
            // Copy pages and plugins to docs
            // docs: {
            //     files: [{
            //         src: ['**/*'],
            //         expand: true,
            //         cwd: '<%= config.dist %>',
            //         dest: '<%= config.docs %>/pages/',
            //     }, {
            //         src: ['**/*'],
            //         expand: true,
            //         cwd: '<%= config.plugins %>',
            //         dest: '<%= config.docs %>/assets/plugins',
            //     }]
            // },
            boilerplates: {
                files: [{
                    src: ['**/*'],
                    expand: true,
                    cwd: 'boilerplates',
                    dest: '<%= config.bundle %>/boilerplates/',
                }]
            },
            // Copy pages, plugins and assets to barebone
            barebone: {
                files: [{
                    src: ['**/*'],
                    expand: true,
                    dot: true,
                    cwd: '<%= config.barebone %>',
                    dest: '<%= config.bundle %>/getting_started/',
                }, {
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest: '<%= config.bundle %>/getting_started/html/pages/',
                },{
                    src: ['**/*',
                    '!angular/**/*',
                    '!angular-bootstrap-nav-tree/**/*',
                    '!angular-dropzone/**/*',
                    '!angular-google-map-loader/**/*',
                    '!angular-nestable/**/*',
                    '!angular-nvd3/**/*',
                    '!angular-oc-lazyload/**/*',
                    '!angular-rickshaw/**/*',
                    '!angular-sanitize/**/*',
                    '!angular-sparkline/**/*',
                    '!angular-summernote/**/*',
                    '!angular-ui-router/**/*',
                    '!angular-ui-select/**/*',
                    '!angular-ui-util/**/*',
                    '!angular-wizard/**/*',
                    '!ng-switchery/**/*'
                    ],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest: '<%= config.bundle %>/getting_started/html/assets/plugins',
                }, {
                    src: ['img/logo_white.png',
                        'img/logo_white_2x.png',
                        'img/logo.png',
                        'img/logo_2x.png',
                        'img/profiles/1.jpg',
                        'img/profiles/1x.jpg',
                        'img/profiles/2.jpg',
                        'img/profiles/2x.jpg',
                        'img/profiles/3.jpg',
                        'img/profiles/3x.jpg',
                        'img/profiles/avatar_small.jpg',
                        'img/profiles/avatar_small2x.jpg',
                        'img/profiles/avatar.jpg',
                        'img/profiles/avatar2x.jpg',
                    ],
                    expand: true,
                    cwd: '<%= config.demo %>/assets',
                    dest: '<%= config.bundle %>/getting_started/html/assets/',
                }, {
                    src: ['img/logo_white.png',
                        'img/logo_white_2x.png',
                        'img/logo.png',
                        'img/logo_2x.png',
                        'img/profiles/1.jpg',
                        'img/profiles/1x.jpg',
                        'img/profiles/2.jpg',
                        'img/profiles/2x.jpg',
                        'img/profiles/3.jpg',
                        'img/profiles/3x.jpg',
                        'img/profiles/avatar_small.jpg',
                        'img/profiles/avatar_small2x.jpg',
                        'img/profiles/avatar.jpg',
                        'img/profiles/avatar2x.jpg',
                    ],
                    expand: true,
                    cwd: '<%= config.demo %>/assets',
                    dest: '<%= config.bundle %>/getting_started/jquery/assets/',
                }]
            },

            // Copy bundle files
            bundle: {
                files: [{
                    src: ['**/*','html/*.html','!html/widget.html','!meteor/*.*','!angular/node_modules/**/*'],
                    expand: true,
                    cwd: '<%= config.demo %>',
                    dest: '<%= config.bundle %>/demo/',
                }, {
                    src: ['documentation.html'],
                    expand: true,
                    cwd: '<%= config.docs %>',
                    dest: '<%= config.bundle %>/',
                },{
                    src: ['documentation-angular.html'],
                    expand: true,
                    cwd: '<%= config.docs %>',
                    dest: '<%= config.bundle %>/',
                },{
                    src: ['changelog.txt'],
                    expand: true,
                    cwd: '',
                    dest: '<%= config.bundle %>/'
                }, {
                    src: ['**/*','!angular/node_modules/**/*'],
                    expand: true,
                    cwd: '<%= config.barebone %>',
                    dest: '<%= config.bundle %>/getting_started/',
                }, {
                    src: ['**/*'],
                    expand: true,
                    cwd: 'grunt',
                    dest: '<%= config.bundle %>/grunt/',
                }, {
                    src: ['**/*'],
                    expand: true,
                    cwd: 'gulp',
                    dest: '<%= config.bundle %>/gulp/',
                }, {
                    src: ['**/*'],
                    expand: true,
                    cwd: 'widgets/dist',
                    dest: '<%= config.bundle %>/widgets/',
                }, {
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.demo %>/html/condensed/assets',
                    dest: '<%= config.bundle %>/widgets/assets',
                }, {
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest: '<%= config.bundle %>/widgets/assets/plugins',
                },{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest: '<%= config.bundle %>/widgets/pages',
                }, {
                    src: ['Pages_PSD.zip'],
                    expand: true,
                    cwd: '',
                    dest: '<%= config.bundle %>/',
                }
                ]
            },

            live: {
                //html
                files: [{
                        src: ['**/*'],
                        expand: true,
                        cwd: '<%= config.dist %>',
                        dest:'<%= config.live %>/html/condensed/pages/',
                    },{
                        src: ['**/*'],
                        expand: true,
                        cwd: '<%= config.dist %>',
                        dest:'<%= config.live %>/html/executive/pages/',
                    },{
                        src: ['**/*'],
                        expand: true,
                        cwd: '<%= config.dist %>',
                        dest:'<%= config.live %>/html/casual/pages/',
                    },{
                        src: ['**/*'],
                        expand: true,
                        cwd: '<%= config.dist %>',
                        dest:'<%= config.live %>/html/corporate/pages/',
                    },{
                        src: ['**/*'],
                        expand: true,
                        cwd: '<%= config.dist %>',
                        dest:'<%= config.live %>/html/simply_white/pages/',
                    },{
                        src: ['**/*'],
                        expand: true,
                        cwd: 'live-dist',
                        dest:'<%= config.live %>/html/condensed/assets/plugins/',
                    },{
                        src: ['**/*'],
                        expand: true,
                        cwd: 'live-dist',
                        dest:'<%= config.live %>/html/executive/assets/plugins/',
                    },{
                        src: ['**/*'],
                        expand: true,
                        cwd: 'live-dist',
                        dest:'<%= config.live %>/html/casual/assets/plugins/',
                    },{
                        src: ['**/*'],
                        expand: true,
                        cwd: 'live-dist',
                        dest:'<%= config.live %>/html/corporate/assets/plugins/',
                    },{
                        src: ['**/*'],
                        expand: true,
                        cwd: 'live-dist',
                        dest:'<%= config.live %>/html/simply_white/assets/plugins/',
                    },{
                    src: ['**/*',
                    '!angular/**/*',
                    '!angular-bootstrap-nav-tree/**/*',
                    '!angular-dropzone/**/*',
                    '!angular-google-map-loader/**/*',
                    '!angular-nestable/**/*',
                    '!angular-nvd3/**/*',
                    '!angular-oc-lazyload/**/*',
                    '!angular-rickshaw/**/*',
                    '!angular-sanitize/**/*',
                    '!angular-sparkline/**/*',
                    '!angular-summernote/**/*',
                    '!angular-ui-router/**/*',
                    '!angular-ui-select/**/*',
                    '!angular-ui-util/**/*',
                    '!angular-wizard/**/*',
                    '!ng-switchery/**/*'
                    ],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest:'<%= config.live %>/html/condensed/assets/plugins',
                },{
                    src: ['**/*',
                    '!angular/**/*',
                    '!angular-bootstrap-nav-tree/**/*',
                    '!angular-dropzone/**/*',
                    '!angular-google-map-loader/**/*',
                    '!angular-nestable/**/*',
                    '!angular-nvd3/**/*',
                    '!angular-oc-lazyload/**/*',
                    '!angular-rickshaw/**/*',
                    '!angular-sanitize/**/*',
                    '!angular-sparkline/**/*',
                    '!angular-summernote/**/*',
                    '!angular-ui-router/**/*',
                    '!angular-ui-select/**/*',
                    '!angular-ui-util/**/*',
                    '!angular-wizard/**/*',
                    '!ng-switchery/**/*'
                    ],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest:'<%= config.live %>/html/executive/assets/plugins'
                },
                {
                    src: ['**/*',
                    '!angular/**/*',
                    '!angular-bootstrap-nav-tree/**/*',
                    '!angular-dropzone/**/*',
                    '!angular-google-map-loader/**/*',
                    '!angular-nestable/**/*',
                    '!angular-nvd3/**/*',
                    '!angular-oc-lazyload/**/*',
                    '!angular-rickshaw/**/*',
                    '!angular-sanitize/**/*',
                    '!angular-sparkline/**/*',
                    '!angular-summernote/**/*',
                    '!angular-ui-router/**/*',
                    '!angular-ui-select/**/*',
                    '!angular-ui-util/**/*',
                    '!angular-wizard/**/*',
                    '!ng-switchery/**/*'
                    ],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest:'<%= config.live %>/html/casual/assets/plugins'
                },
                {
                    src: ['**/*',
                    '!angular/**/*',
                    '!angular-bootstrap-nav-tree/**/*',
                    '!angular-dropzone/**/*',
                    '!angular-google-map-loader/**/*',
                    '!angular-nestable/**/*',
                    '!angular-nvd3/**/*',
                    '!angular-oc-lazyload/**/*',
                    '!angular-rickshaw/**/*',
                    '!angular-sanitize/**/*',
                    '!angular-sparkline/**/*',
                    '!angular-summernote/**/*',
                    '!angular-ui-router/**/*',
                    '!angular-ui-select/**/*',
                    '!angular-ui-util/**/*',
                    '!angular-wizard/**/*',
                    '!ng-switchery/**/*'
                    ],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest:'<%= config.live %>/html/corporate/assets/plugins'
                },{
                    src: ['**/*',
                    '!angular/**/*',
                    '!angular-bootstrap-nav-tree/**/*',
                    '!angular-dropzone/**/*',
                    '!angular-google-map-loader/**/*',
                    '!angular-nestable/**/*',
                    '!angular-nvd3/**/*',
                    '!angular-oc-lazyload/**/*',
                    '!angular-rickshaw/**/*',
                    '!angular-sanitize/**/*',
                    '!angular-sparkline/**/*',
                    '!angular-summernote/**/*',
                    '!angular-ui-router/**/*',
                    '!angular-ui-select/**/*',
                    '!angular-ui-util/**/*',
                    '!angular-wizard/**/*',
                    '!ng-switchery/**/*'
                    ],
                    expand: true,
                    cwd: '<%= config.plugins %>',
                    dest:'<%= config.live %>/html/simply_white/assets/plugins'
                },
                // Copy favicons
                {
                    src: ['favicon.ico'],
                    expand: true,
                    cwd: './',
                    dest: '<%= config.live %>/html/condensed',
                },
                {
                    src: ['favicon.ico'],
                    expand: true,
                    cwd: './',
                    dest: '<%= config.live %>/html/casual',
                },
                {
                    src: ['favicon.ico'],
                    expand: true,
                    cwd: './',
                    dest: '<%= config.live %>/html/executive',
                },
                {
                    src: ['favicon.ico'],
                    expand: true,
                    cwd: './',
                    dest: '<%= config.live %>/html/corporate',
                },{
                    src: ['favicon.ico'],
                    expand: true,
                    cwd: './',
                    dest: '<%= config.live %>/html/simply_white',
                },{
                        src: ['**/*'],
                        expand: true,
                        cwd: '<%= config.demo %>/html/condensed/assets',
                        dest: '<%= config.live %>/html/condensed/assets',
                },
                {
                        src: ['**/*'],
                        expand: true,
                        cwd: '<%= config.demo %>/html/casual/assets',
                        dest: '<%= config.live %>/html/casual/assets',
                },
                {
                        src: ['**/*'],
                        expand: true,
                        cwd: '<%= config.demo %>/html/corporate/assets',
                        dest: '<%= config.live %>/html/corporate/assets',
                },
                {
                        src: ['**/*'],
                        expand: true,
                        cwd: '<%= config.demo %>/html/simply_white/assets',
                        dest: '<%= config.live %>/html/simply_white/assets',
                },
                {
                        src: ['**/*'],
                        expand: true,
                        cwd: '<%= config.demo %>/html/executive/assets',
                        dest: '<%= config.live %>/html/executive/assets',
                },

                    {
                        src: ['*.html'],
                        expand: true,
                        cwd: '<%= config.bundle %>/demo/html/condensed',
                        dest: '<%= config.live %>/html/condensed',
                    },
                    {
                        src: ['*.html'],
                        expand: true,
                        cwd: '<%= config.bundle %>/demo/html/casual',
                        dest: '<%= config.live %>/html/casual',
                    },
                    {
                        src: ['*.html'],
                        expand: true,
                        cwd: '<%= config.bundle %>/demo/html/corporate',
                        dest: '<%= config.live %>/html/corporate',
                    },
                    {
                        src: ['*.html'],
                        expand: true,
                        cwd: '<%= config.bundle %>/demo/html/simply_white',
                        dest: '<%= config.live %>/html/simply_white',
                    },
                    {
                        src: ['*.html'],
                        expand: true,
                        cwd: '<%= config.bundle %>/demo/html/executive',
                        dest: '<%= config.live %>/html/executive',
                    },

                    {
                        src: ['**/*'],
                        expand: true,
                        cwd: '<%= config.bundle %>/docs',
                        dest: '<%= config.live %>/docs',
                    }
                ]
            },

            parent: {
                files: [{
                    src: ['**/*'],
                    expand: true,
                    dot: true,
                    cwd: '<%= config.bundle %>/',
                    dest: '<%= config.parent %>',
                }]
            },
            widgets: {
                files: [{
                    src: ['**/*', '!index.html', '!layout.html'],
                    expand: true,
                    cwd: '<%= config.widgets_src %>/src',
                    dest: '<%= config.widgets_src %>/dist/',
                }]
            },
            widgets_deploy: {
                files: [{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.widgets_src %>/dist',
                    dest: '<%= config.widgets %>/',
                },{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.bundle %>/demo/html/assets',
                    dest: '<%= config.widgets %>/assets',
                },{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.bundle %>/demo/html/pages',
                    dest: '<%= config.widgets %>/pages',
                }]
            },
            jsDev: {
                files: [{
                    src: ['**/*'],
                    expand: true,
                    cwd: '<%= config.dist %>',
                    dest:'<%= config.bundle %>/demo/html/condensed/pages/',
                }]
            }
        },
        // Prettify a directory of files
        prettify: {

            demo: {
                expand: true,
                cwd: '<%= config.bundle %>/demo/html',
                ext: '.html',
                src: ['**/*.html'],
                dest: '<%= config.bundle %>/demo/html'
            },
            widgets: {
                expand: true,
                cwd: '<%= config.bundle %>/widgets',
                ext: '.html',
                src: ['**/*.html','!<%= config.bundle %>/widgets/assets','!<%= config.bundle %>/widgets/pages'],
                dest: '<%= config.bundle %>/widgets'
            },
            live: {
                expand: true,
                cwd: '<%= config.live %>/',
                ext: '.html',
                src: ['*.html'],
                dest: '<%= config.live %>/'
            },
            barebone: {
                expand: true,
                cwd: '<%= config.barebone %>/',
                ext: '.html',
                src: ['*.html'],
                dest: '<%= config.barebone %>/'
            }
        },
        // Merge libs required by Pages into pages dist 
        concat: {
            // '<%= config.dist %>/js/pages.js': [
            //     '<%= config.plugins %>/velocity/velocity.min.js',
            //     '<%= config.dist %>/js/pages.js'
            // ],
            '<%= config.dist %>/js/pages.js': [
                '<%= config.core %>/js/pages.js',
                '<%= config.core %>/js/ui/select.js',
                '<%= config.core %>/js/ui/chat.js',
                '<%= config.core %>/js/ui/circular-progress.js',
                '<%= config.core %>/js/ui/notification.js',
                '<%= config.core %>/js/ui/card.js',
                '<%= config.core %>/js/ui/mobile-view.js',
                '<%= config.core %>/js/ui/quickview.js',
                '<%= config.core %>/js/ui/parallax.js',
                '<%= config.core %>/js/ui/sidebar.js',
                '<%= config.core %>/js/ui/search.js',
                '<%= config.core %>/js/pages.init.js'
            ],
            'live-dist/vendor-script.js':[
                '<%= config.plugins %>/jquery/jquery-3.2.1.min.js',
                '<%= config.plugins %>/modernizr.custom.js',
                '<%= config.plugins %>/jquery-ui/jquery-ui.min.js',
                '<%= config.plugins %>/popper/umd/popper.min.js',
                '<%= config.plugins %>/bootstrap/js/bootstrap.min.js',
                '<%= config.plugins %>/jquery/jquery-easy.js',
                '<%= config.plugins %>/jquery-unveil/jquery.unveil.min.js',
                '<%= config.plugins %>/jquery-ios-list/jquery.ioslist.min.js',
                '<%= config.plugins %>/jquery-actual/jquery.actual.min.js',
                '<%= config.plugins %>/jquery-scrollbar/jquery.scrollbar.min.js',
                '<%= config.plugins %>/select2/js/select2.full.min.js',
                '<%= config.plugins %>/classie/classie.js',
                '<%= config.plugins %>/switchery/js/switchery.min.js',
                '<%= config.plugins %>/interactjs/interact.min.js',
                '<%= config.plugins %>/moment/moment-with-locales.min.js',
                '<%= config.plugins %>/nvd3/lib/d3.v3.js',
                '<%= config.plugins %>/nvd3/nv.d3.min.js',
                '<%= config.plugins %>/nvd3/src/utils.js',
                '<%= config.plugins %>/nvd3/src/tooltip.js',
                '<%= config.plugins %>/nvd3/src/interactiveLayer.js',
                '<%= config.plugins %>/nvd3/src/models/axis.js',
                '<%= config.plugins %>/nvd3/src/models/line.js',
                '<%= config.plugins %>/nvd3/src/models/lineWithFocusChart.js',
                '<%= config.plugins %>/rickshaw/rickshaw.min.js',
                '<%= config.plugins %>/jquery-metrojs/MetroJs.min.js"',
                '<%= config.plugins %>/jquery-sparkline/jquery.sparkline.min.js',
                '<%= config.plugins %>/skycons/skycons.js',
                '<%= config.plugins %>/bootstrap-datepicker/js/bootstrap-datepicker.js',
                '<%= config.plugins %>/jquery-datatable/media/js/jquery.dataTables.min.js',
                '<%= config.plugins %>/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
                '<%= config.plugins %>/jquery-datatable/media/js/dataTables.bootstrap.js',
                '<%= config.plugins %>/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js',
                '<%= config.plugins %>/datatables-responsive/js/datatables.responsive.js',
                '<%= config.plugins %>/datatables-responsive/js/lodash.min.js',
                '<%= config.plugins %>/jquery-validation/js/jquery.validate.min.js',
                '<%= config.plugins %>/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js',
                '<%= config.plugins %>/jquery-autonumeric/autoNumeric.js',
                '<%= config.plugins %>/dropzone/dropzone.min.js',
                '<%= config.plugins %>/bootstrap-tag/bootstrap-tagsinput.min.js',
                '<%= config.plugins %>/jquery-inputmask/jquery.inputmask.min.js',
                '<%= config.plugins %>/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js',
                '<%= config.plugins %>/summernote/js/summernote.min.js',
                '<%= config.plugins %>/bootstrap-daterangepicker/daterangepicker.js',
                '<%= config.plugins %>/bootstrap-timepicker/bootstrap-timepicker.min.js',
                '<%= config.plugins %>/bootstrap-typehead/typeahead.bundle.min.js',
                '<%= config.plugins %>/bootstrap-typehead/typeahead.jquery.min.js',
                '<%= config.plugins %>/handlebars/handlebars-v4.0.5.js',
                '<%= config.plugins %>/jquery-metrojs/MetroJs.min.js',
                '<%= config.plugins %>/imagesloaded/imagesloaded.pkgd.min.js',
                '<%= config.plugins %>/jquery-isotope/isotope.pkgd.min.js',
                '<%= config.plugins %>/codrops-dialogFx/dialogFx.js',
                '<%= config.plugins %>/owl-carousel/owl.carousel.min.js',
                '<%= config.plugins %>/jquery-nouislider/jquery.nouislider.min.js',
                '<%= config.plugins %>/jquery-nouislider/jquery.liblink.js',
                '<%= config.plugins %>/jquery.sieve.min.js',
                '<%= config.plugins %>/jquery-nestable/jquery.nestable.js"',
                '<%= config.plugins %>/ion-slider/js/ion.rangeSlider.min.js',
                '<%= config.plugins %>/codrops-stepsform/js/stepsForm.js',
                '<%= config.plugins %>/jquery-dynatree/jquery.dynatree.min.js',
                '<%= config.plugins %>/mapplic/js/hammer.min.js',
                '<%= config.plugins %>/mapplic/js/jquery.mousewheel.js',
                '<%= config.plugins %>/mapplic/js/mapplic.js',
            ],
            'live-dist/vendor-styles.min.css':[
                '<%= config.plugins %>/bootstrap/css/bootstrap.min.css',
                '<%= config.plugins %>/font-awesome/css/font-awesome.css',
                '<%= config.plugins %>/jquery-scrollbar/jquery.scrollbar.css',
                '<%= config.plugins %>/select2/css/select2.min.css',
                '<%= config.plugins %>/switchery/css/switchery.min.css',
                '<%= config.plugins %>/nvd3/nv.d3.min.css',
                '<%= config.plugins %>/mapplic/css/mapplic.css',
                '<%= config.plugins %>/rickshaw/rickshaw.min.css',
                '<%= config.plugins %>/bootstrap-datepicker/css/datepicker3.css',
                '<%= config.plugins %>/jquery-datatable/media/css/dataTables.bootstrap.min.css',
                '<%= config.plugins %>/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css',
                '<%= config.plugins %>/datatables-responsive/css/datatables.responsive.css',
                '<%= config.plugins %>/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css',
                '<%= config.plugins %>/bootstrap-tag/bootstrap-tagsinput.css',
                '<%= config.plugins %>/dropzone/css/dropzone.css',
                '<%= config.plugins %>/summernote/css/summernote.css',
                '<%= config.plugins %>/bootstrap-daterangepicker/daterangepicker-bs3.css',
                '<%= config.plugins %>/bootstrap-timepicker/bootstrap-timepicker.min.css',
                '<%= config.plugins %>/jquery-metrojs/MetroJs.css',
                '<%= config.plugins %>/codrops-dialogFx/dialog.css',
                '<%= config.plugins %>/codrops-dialogFx/dialog-sandra.css',
                '<%= config.plugins %>/owl-carousel/assets/owl.carousel.css',
                '<%= config.plugins %>/jquery-nouislider/jquery.nouislider.css',
                '<%= config.plugins %>/simple-line-icons/simple-line-icons.css',
                '<%= config.plugins %>/jquery-nestable/jquery.nestable.css',
                '<%= config.plugins %>/ion-slider/css/ion.rangeSlider.css',
                '<%= config.plugins %>/ion-slider/css/ion.rangeSlider.skinFlat.css',
                '<%= config.plugins %>/codrops-stepsform/css/component.css',
                '<%= config.plugins %>/jquery-datatable/media/css/dataTables.bootstrap.min.css"',
                '<%= config.plugins %>/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css',
                '<%= config.plugins %>/datatables-responsive/css/datatables.responsive.css',
                '<%= config.plugins %>/jquery-dynatree/skin/ui.dynatree.css',
            ]
        },

        // Uglify JS to create *.min versions
        uglify: {
            options: {
                mangle: false
            },
            my_target: {
                files: [{
                    dest: '<%= config.dist %>/js/pages.min.js',
                    src: '<%= config.dist %>/js/pages.js'
                }, {
                    dest: '<%= config.dist %>/js/pages.calendar.min.js',
                    src: '<%= config.core %>/js/pages.calendar.js'
                }, {
                    dest: '<%= config.dist %>/js/pages.social.min.js',
                    src: '<%= config.core %>/js/pages.social.js'
                },
                // {
                //     dest: 'live-dist/vendor-script.min.js',
                //     src: 'live-dist/vendor-script.js'
                // }
             ]
            }
        },
        // HTML validation
        validation: {
            options: {
                reset: true
            },
            files: {
                src: ['<%= config.demo %>/html/*.html']
            }
        },
          jsvalidate: {
            options:{
              globals: {},
              esprimaOptions: {},
              verbose: false
            },
            targetName:{
              files:{
                src:['<%= config.dist %>/js/*.js']
              }
            }
          },
          nodeunit: {
            files: ['<%= config.dist %>/js/*.js']
          },
        // Minify dist CSS
        cssmin: {
            ltr: {
                files: [{
                    expand: true,
                    cwd: '<%= config.dist %>/css/',
                    src: ['**/*.css', '!**/*.rtl.css', '!**/*.min.css'],
                    dest: '<%= config.dist %>/css/',
                    ext: '.min.css'
                }]
            },
            rtl: {
                files: [{
                    expand: true,
                    cwd: '<%= config.dist %>/css/',
                    src: ['**/*.rtl.css', '!**/*.min.css'],
                    dest: '<%= config.dist %>/css/',
                    ext: '.rtl.min.css'
                }]
            }
        },
        // Compress bundle
        compress: {
            bundle: {
                options: {
                    archive: './bundle/pages-admin-<%= config.version %>.zip',
                    mode: 'zip'
                },
                files: [{
                    src: ['./bundle/**', '!./bundle/documentation/**', '!./bundle/pages-admin-<%= config.version %>.zip']
                }]
            }
        },
        env: {
            options: {
                /* Shared Options Hash */
                //globalOption : 'foo'
            },
            live: {
                NODE_ENV: 'LIVE'
            },
            bundle: {
                NODE_ENV: 'BUNDLE'
            }
        },
        preprocess: {
            live: {
                src: ['<%= config.live %>/**/*.html'],
                options: {
                    inline: true,
                }
            },
            bundle: {
                src: ['<%= config.bundle %>/demo/**/*.html'],
                options: {
                    inline: true,
                }
            }
        },
        nunjucks: {


            options: {
                    tags: {
                      variableStart: '{#',
                      variableEnd: '#}'
                    },
                    data: {
                        PATH: "templates/",
                        WIDGET_PATH: "widgets/",
                        DIST_PATH: "../pages/",
                        PLUGINS_PATH: "../assets/plugins/"
                        // ENV: process.env.NODE_ENV
                    },
                    configureEnvironment: function(env, nunjucks) {
                        if(process.env.NODE_ENV == 'LIVE'){
                            env.addGlobal('ENV', 'LIVE');
                        }
                    }
            },
            render: {
                files: [
                   {
                      expand: true,
                      cwd: "demo/html/",
                      src: ["**/*.html","!shared/*.html","!layouts/*.html"],
                      dest: "<%= config.bundle %>/demo/html",
                      ext: ".html"
                   },
                   {
                      expand: true,
                      cwd: "barebone/html/",
                      src: ["**/*.html","!shared/*.html","!layouts/*.html"],
                      dest: "<%= config.bundle %>/getting_started/html",
                      ext: ".html"
                   }, {
                      expand: true,
                      cwd: "widgets/src/",
                      src: ["**/*.html","!layout.html"],
                      dest: "widgets/dist",
                      ext: ".html"
                   }
                ]
            }
        }

    });

    // These plugins loads necessary tasks.
    require('load-grunt-tasks')(grunt, {
        scope: 'devDependencies'
    });
    require('time-grunt')(grunt);

    grunt.registerTask('dist-merge', 'Merge core js modules', function(){
        var modules = '';
        var init = grunt.file.read('./core/js/ui2/init.js')
        var utils = grunt.file.read('./core/js/ui2/utils.js')
        var returns = [];

        function getModuleName(fileName){
            var str = fileName.split('.js').shift();
            var cap = str.charAt(0).toUpperCase();
            return cap + str.substr(1);
        }
        // TODO change path to 'ui/*
        grunt.file.recurse('./core/js/ui2', function(file, rootdir, subdir, filename){
            if(/utils/.test(filename) || /init/.test(filename)) return ;

                var output = grunt.file.read(file)
                modules += output + '\n\n';
                var moduleName = getModuleName(filename)
                returns.push(moduleName + ': ' + moduleName)
        })


        var content = '// Native Javascript for Pages 4.0 \n'
        content +=     '(function (root, factory) { \n';
        content +=      utils + '\n';
        content +=  '}(this, function () {\n\n';
        content +=      init + '\n';
        content +=      modules + '\n';
        content +=  'return { \n';
        content +=      returns.join(',\n ')
        content +=  '\n}; \n';
        content += '}));';

        grunt.file.write('./dist/pages/js/pages.js', content);
    })

    // Dist JS.
    grunt.registerTask('dist-js', ['concat', 'uglify','copy:distPages']);

    // Dist CSS
    // TODO: Add 'autoprefixer', 'usebanner', 'csscomb'
    grunt.registerTask('dist-css', function(){
        var preprocessor = grunt.option('cssPreprocessor') || 'less'; // 'sass' or 'less'
        grunt.task.run([preprocessor, 'cssmin','copy:distPages']);
    });

    grunt.registerTask('dist-sass', function(){
        grunt.task.run(['sass','copy:distPages']);
    });

    grunt.registerTask('css-build', function(){
        var preprocessor = grunt.option('cssPreprocessor') || 'less:default'; // 'sass' or 'less'
        grunt.task.run([preprocessor,'copy:distPages']);
    });

    // Copy files to dist.
    grunt.registerTask('dist-copy', ['copy:dist']);

    // Pages core build task (Creates dist folder)
    grunt.registerTask('dist', ['clean:dist', 'dist-css', 'dist-copy', 'dist-js']);

    // Demo task
    grunt.registerTask('demo', ['env:bundle', 'clean:demo', 'clean:dist', 'dist', 'tpl','copy:demo', 'prettify:demo', 'preprocess:bundle']);

    // JS dev task
    grunt.registerTask('js-dev', ['dist-js', 'copy:jsDev']);

    // Barebone task
    grunt.registerTask('barebone', ['clean:barebone', 'clean:dist', 'dist', 'copy:barebone', 'prettify:barebone']);

    // Default task.
    grunt.registerTask('default', ['dist']);

    grunt.registerTask('tpl', ['nunjucks']);

    grunt.registerTask('js', ['jsvalidate']);

    // Make the bundle with everything
    grunt.registerTask('bundle', [
        'env:bundle',
        'clean:bundle',
        'dist',
        'widgets',
        'copy:bundle',
        'copy:demo',
        'copy:cli',
        'copy:barebone',
        'tpl',
        'prettify:demo',
        'prettify:barebone',
        'prettify:widgets',
        'clean:rm_widget',
        'compress'
    ]);

    grunt.registerTask('build', [
        'env:bundle',
        'clean:bundle',
        'dist',
        'widgets',
        'copy:bundle',
        'copy:demo',
        'tpl',
        'clean:rm_widget'
    ]);

    grunt.registerTask('test', [
        'clean:dist',
        'sass',
        'less'
    ]);

    // Online demo version with theme switcher option.
    grunt.registerTask('live', [
        'env:live',
        'clean:live',
        'dist',
        'tpl',
        'copy:live',
        'preprocess:live',
        'prettify:live'
    ]);

    // Builds widgets for widget manager
    grunt.registerTask('widgets', ['copy:widgets','nunjucks']);

    // Deployment tasks called by DeployBot
    grunt.registerTask('stage', [
        'clean:staging',
        'copy:staging'
    ]);


    grunt.registerTask('landing', [
        'copy:landing'
    ]);
    grunt.registerTask('production', [
        'live',
        'copy:production'
    ]);

    grunt.registerTask('deploy-widgets', [
        'env:live',
        'widgets',
        'copy:widgets_deploy'
    ]);

};
