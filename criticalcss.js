const critical = require('critical');
require('dotenv').config();

console.log('Start generating critcal css for '+process.env.APP_URL)
critical.generate({
	src: process.env.APP_URL +"?bot=1",
	width: 1300,
	height: 900,
	inline: false,
    target: "public/css/critical.min.css"
}, (err, criticalCSS) => {
	if(err) {
		console.error(err)
	} else {
		console.log('Build successful!')
	}
});

