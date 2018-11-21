const mix = require('laravel-mix');

mix.autoload({
		jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery", "modal"],
		'popper.js/dist/umd/popper.js': ['Popper']
	})
	.scripts('resources/js/jquery.min.js', 'public/js/jquery.min.js')
	.scripts('resources/js/popper.js', 'public/js/popper.js')
	.scripts('resources/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
	.scripts('resources/js/modernizer.min.js', 'public/js/modernizer.min.js')
	.scripts('resources/js/waves.js', 'public/js/waves.js')
	.scripts('resources/js/jquery.slimscroll.js', 'public/js/jquery.slimscroll.js')
	.scripts('resources/js/jquery.nicescroll.js', 'public/js/jquery.nicescroll.js')
	.scripts('resources/js/jquery.scrollTo.min.js', 'public/js/jquery.scrollTo.min.js')
	.scripts('resources/js/dashboard.js', 'public/js/dashboard.js')
	.js('resources/js/app.min.js', 'public/js')
	.sass('resources/sass/bootstrap.scss', 'public/css')
	.styles([
		'resources/css/icons.css',
		'resources/css/style.css'
	], 'public/css/dashboard.min.css')
	.stylus('resources/stylus/app.min.styl', 'public/css')