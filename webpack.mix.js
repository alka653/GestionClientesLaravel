const mix = require('laravel-mix');

mix.js('resources/js/app.min.js', 'public/js')
	.styles([
		'resources/css/bootstrap-grid.min.css',
		'resources/css/bootstrap-table.css'
	], 'public/css/dashboard.min.css')
	.stylus('resources/stylus/app.min.styl', 'public/css')