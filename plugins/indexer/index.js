module.exports = plugin;

var jsonfile = require('jsonfile');
var match = require('multimatch');

function plugin(options){

	options = options || {};
	var pattern = options.pattern || '**/*.md';

	var make_exerpt = function(text) {

		var chunks = text.split(/\n\n/);
		var s = chunks[0].trim();

		// if we get an H2 heading, grab the next part.
		if (s.substr(0, 2)=='##' && chunks[1]) {
			s = chunks[1].trim();
		}

		s = s.replace(/#/g, '').trim();
		return s;
	};

	// Checks whether files should be processed
    var check = function(file, frontmatter) {
		// Only process files that match the pattern
		if (!match(file, pattern)[0]) {
			return false;
		}

		// Don't process private files
		if (frontmatter.private) {
			return false;
		}

		return true;
    };


    return function (files, metalsmith, done) {
        setImmediate(done);

        var map = [];

        Object.keys(files).forEach(function(file){

			// Get the current file's frontmatter
			var data = files[file];

			// Only process files that pass the check
			if (!check(file, data)) {
				return;
			}

            
            // URL
            var hostname = (options.hostname || '') + '/';
            var path = file;
            if (options.omitIndex) {
            	path = path.replace('.md', '/');
            }

            // ID
            var id = file.replace('.md', '').replace(/\//g, '.');

            // Type
            var type = file.replace('.md', '').split('/')[0];

            if (type == 'index') return;

            // Text
            var content = data.contents.toString().trim();
            if (content == '') return;

            var excerpt = make_exerpt(content);

            var page = {
            	title: data.title,
            	permalink: hostname + path,
            	id: id,
            	excerpt: excerpt,
            	text: content,
            	type: type
            };
            //console.log(data);

            map.push(page);	
        });	

        jsonfile.writeFile(options.file, map);
        
    };
};