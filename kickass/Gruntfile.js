module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			css: {
				files: '**/*.scss',
				tasks: ['sass', 'postcss'],
				options: {
					livereload: true
				}
			}
		},
		sass: {
			dist: {
				options: {
					style: 'compressed',
					sourcemap: 'none',
					noCache: true
				},
				files: {
					'style.min.css': 'assets/sass/style.scss'
				}
			}
		},
		postcss: {
			options: {
				map: {
					inline: false,
					annotation: ''
				},
				processors: [
					require('autoprefixer')({ browsers: 'last 2 versions' })
				]
			},
			dist: {
				src: 'style.min.css'
			}
		}
	});

	// Load plugins.
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-postcss');

	// Set default task(s).
	grunt.registerTask('default', ['watch']);
	
};