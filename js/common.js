function email(t, d, u) {
	var email = u + '@' + d + '.' + t;
	document.write('<a href="mailto:' + email + '">' + email + '</a>');
}

function common_init() {
	lustrum_countDown_tick()
}

function lustrum_countDown_tick() {
	rms = (new Date(2009, 5, 25) - new Date());
	dagen = parseInt(rms / 1000 / 60 / 60 / 24);
	uren = parseInt(rms / 1000 / 60 / 60 - dagen * 24);
	minuten = parseInt(rms / 1000 / 60 - (dagen * 24 + uren) * 60);
	seconden = parseInt(rms / 1000 - ((dagen * 24 + uren) * 60 + minuten) * 60);
	dagens =  dagen != 1 ? "dagen" : "dag";
	urens = uren != 1 ? "uren" : "uur";
	minutens = minuten != 1 ? "minuten" : "minuut";
	secondens = seconden != 1 ? "seconden" : "seconde";

	objById('lustrumCountDown').innerHTML =
		dagen.toString() + " "+dagens+", " +
		uren.toString() + " "+urens+", " +
		minuten.toString() + " "+minutens+" en " +
		seconden.toString() + " "+secondens+
		" tot het Lustrum!";
	setTimeout('lustrum_countDown_tick()', 1000)
}

function objById(id) {
	var ret = 0;
	if (document.getElementById)
		ret = document.getElementById(id);
	else if (document.all)
		ret = document.all[id];
	else if (document.layers)
		ret = document.layers[id];
	return ret;
}

