'use strict';

var path             = require('path');
var fs 				 = require('fs');
var metalsmith       = require('metalsmith');
var markdown         = require('metalsmith-markdown');
var highlighter      = require('highlighter');
var layouts          = require('metalsmith-layouts');
var Handlebars       = require('handlebars');
var sitemap          = require('metalsmith-sitemap');
var permalinks       = require('metalsmith-permalinks');
var assets           = require('metalsmith-assets');
var inPlace          = require('metalsmith-in-place');
var discoverPartials = require('metalsmith-discover-partials');
var mscopy 			 = require('metalsmith-copy');
var navigation       = require('metalsmith-navigation');
var metadata 		 = require('metalsmith-metadata');
var textReplace 	 = require('metalsmith-text-replace');
var collections 	 = require('metalsmith-collections');
var indexer 		 = require('./plugins/indexer/index.js');


/* Define tasks */

	var searchIndexTask = indexer({
		hostname: 'https://docs.grabaperch.com',
		omitIndex: true,
		file: __dirname+'/src/data/search.json'
	});


	var metadataTask = metadata({
	  	videos: 'data/videos.yml'
	});


	var textReplaceTask = textReplace({
		'**/**': {
			find: /<ul><\/ul>/gi,
			replace: " "
		}
	});

	var discoverPartialsTask = discoverPartials({
		directory: 'partials',
		pattern: /\.md$/
	});

	var collectionsTask = collections({
		video_getting_started: {
			sortBy: 'video_order',
			metadata: {
				title: 'Getting Started',
				description: 'This set of video tutorials aims to take you through the process of building the kind of website typically developed using Perch.',
				path: '/video/getting-started/'
			}
		},
		video_blog: {
			sortBy: 'video_order',
			metadata: {
				title: 'Perch Blog',
				description: 'Add a simple blog to the Swift Migrations Site using the Perch blog app. This tutorial follows on from Getting Started.',
				path: '/video/blog/'
			}
		},
		video_runway: {
			sortBy: 'video_order',
			metadata: {
				title: 'Perch Runway',
				description: 'Videos showing core concepts and how Perch Runway can be used.',
				path: '/video/runway/'
			}
		}
	});

	var markdownTask = markdown({
			gfm: true,
			tables: true,
			smartypants: true
		});

	var permalinksTask = permalinks({
		relative: false
	});

	var layoutsTask = layouts({
			directory: 'layouts',
			partials: 'partials',
			default: 'default.html',
			pattern: '**/*.html',
			partialExtension: '.md',
			engine: 'handlebars'
		});

	var sitemapTask = sitemap({
			hostname: 'https://docs.grabaperch.com',
			omitIndex: true
		});

	var assetsTask = assets({
	    source: './patterns/static',
	    destination: './assets'
	});

	var htaccessTask = mscopy({
		pattern: '.htaccess',
		directory: 'public'
	});

	var redirectsTask = mscopy({
		pattern: '_redirects',
		directory: 'public'
	});

	var contentTemplatingTask = inPlace({
		engine: 'handlebars',
		partials: './partials/'
	});

/* Navigation config */

	var navConfigs = {
	    primary: {
			sortBy: 'nav_sort',
	        filterProperty: 'nav_groups',
	        includeDirs: true
	    },
	    footer: {
	        sortBy: 'nav_sort',
	        filterProperty: 'nav_groups',
	        includeDirs: true
	    }
	};

	var navSettings = {
	    navListProperty: 'navs',
	    //permalinks: true
	};

	var navTask = navigation(navConfigs, navSettings);


/* Template helpers */

	var relativePathHelper = function(current, target) {
	    // normalize and remove starting slash from path
	    if(!current || !target){
	        return '';
	    }
	    current = path.normalize(current).slice(0);
	    target = path.normalize(target).slice(0);
	    current = path.dirname(current);
	    return path.relative(current, target).replace(/\\/g, '/');
	};

	Handlebars.registerHelper('relative_path', relativePathHelper);


	var internalLinkHelper = function(url) {
		url = url.replace('index.html', '');
		url = url.replace('.html', '/');
		var parts = url.split('/');
		parts.pop();
		url = '/' + parts.join('/') + '/';
		return url.replace('//', '/');
	};

	Handlebars.registerHelper('linkTo', internalLinkHelper);

	var equalHelper = function(lvalue, rvalue, options) {
	    if (arguments.length < 3)
	        throw new Error("Handlebars Helper equal needs 2 parameters");
	    if( lvalue!=rvalue ) {
	        return options.inverse(this);
	    } else {
	        return options.fn(this);
	    }
	};

	Handlebars.registerHelper('equal', equalHelper);

	var inSectionHelper = function(lvalue, rvalue, options) {
	    if (arguments.length < 3)
	        throw new Error("Handlebars Helper equal needs 2 parameters");

	    //console.log(find_section(lvalue));

	    if (!is_ancestor_or_sibling(lvalue, rvalue)) {
	        return options.inverse(this);
	    } else {
	        return options.fn(this);
	    }
	};

	var is_ancestor_or_sibling = function(path, active_path) {

		path = path || '';
		active_path = active_path || '';

		var p1 = path.split('/');
		p1.pop();

		// top level? These are in the blue bar already
		if (p1=='') return false;

		var p2 = active_path.split('/');
		p2.pop();
		var s1 = p1.join('/');
		var s2 = p2.join('/');

		// is sibling?
		if (s1==s2) {
			//console.log('Sibling: %s for %s', path, active_path);

			return true;
		}

		// is ancestor?
		p1 = path.replace('.html', '');
		if (s2.indexOf(p1+'/')===0) {
			//console.log('Ancestor: %s for %s', path, active_path);
			return true;
		}

		// decendant?
		p2 = active_path.replace('.html', '');
		if (p1.indexOf(p2+'/')===0) {

			// 1 level deeper?
			if (path.split('/').length == active_path.split('/').length+1) {
				return true;
			}
		}

		// sibling of parent?
		var p1 = path.split('/');
		p1.pop()
		var p2 = active_path.split('/');
		p2.pop();
		if (p2.length){
			p2.pop();
			var s1 = p1.join('/');
			var s2 = p2.join('/');
			if (s1==s2) {
				//console.log('Parent sibling: %s for %s', path, active_path);

				return true;
			}
		}

		// three deep
		if (p2.length){
			p2.pop();
			var s1 = p1.join('/');
			var s2 = p2.join('/');
			if (s1==s2) {
				//console.log('Parent sibling: %s for %s', path, active_path);

				return true;
			}
		}
		// three deep


		//console.log('Unrelated: %s for %s', path, active_path);
		return false;
	}

	Handlebars.registerHelper('insection', inSectionHelper);

	var currentSectionHelper = function(path, active_path, options) {

		path = path || '';
		active_path = active_path || '';

		if (path == active_path.replace('.html', '')) {
			return options.fn(this);
		}

		var active_parts = active_path.split('/');
		if (active_parts[0] == path) {
			return options.fn(this);
		}
		//console.log(active_path);
		//console.log('%s vs %s for %s', active_parts[0], path, active_path);
		return options.inverse(this);
	};

	Handlebars.registerHelper('currentsection', currentSectionHelper);


/* Meta data */

	var meta = {
	    title: 'Perch docs',
	    description: 'Perch documentation',
	    partials: {
	        //breadcrumbs: '_breadcrumbs',
	        nav_global : '_nav_global',
	        nav_relative : '_nav_relative',
	        nav_footer : '_nav_footer',
	        nav__children: '_nav__children',
	        nav__direct_children: '_nav__direct_children',
	        site_nav: '_site_nav',
	        footer: '_footer',
	    },
	    nav_groups: [
	    	'primary'
	    ],
	    nav_sort: 1
	};

/* Go go go! */

var metalsmith = metalsmith(__dirname)
	.source('src')
	.metadata(meta)
	.use(metadataTask)
	.use(collectionsTask)
	.use(discoverPartialsTask)
	.use(contentTemplatingTask)
	.use(searchIndexTask)
	.use(markdownTask)
	.use(navTask)
	.use(permalinksTask)
	.use(layoutsTask)
	.use(sitemapTask)
	.use(assetsTask)
	.use(redirectsTask)
	.use(textReplaceTask)
	.destination('public')
	.build(function (err) {
		if (err) {
			throw err;
		}
	}
);
