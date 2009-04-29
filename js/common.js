function email(t, d, u) {
	var email = u + '@' + d + '.' + t;
	document.write('<a href="mailto:' + email + '">' + email + '</a>');
}

function common_init() {
	lustrum_countDown_tick()
}

function humane_enum(a) {
	var ret = "";
	var first = true;
	for(var i=0; i < a.length; i++) {
		if(first) first = false;
		else ret += i == a.length - 1 ? ' en ' : ', ';
		ret += a[i];
	}
	return ret;
}

function lustrum_countDown_tick() {
	var rms = (new Date(2009, 4, 25) - new Date());
	var neg = rms < 0;
	rms = neg ? -rms : rms;
	
	var dagen = parseInt(rms / 1000 / 60 / 60 / 24);
	var uren = parseInt(rms / 1000 / 60 / 60 - dagen * 24);
	var minuten = parseInt(rms / 1000 / 60 - (dagen * 24 + uren) * 60);
	var seconden = parseInt(rms / 1000 - ((dagen * 24 + uren) * 60 + minuten) * 60);
	var dagens =  dagen != 1 ? "dagen" : "dag";
	var urens = uren != 1 ? "uren" : "uur";
	var minutens = minuten != 1 ? "minuten" : "minuut";
	var secondens = seconden != 1 ? "seconden" : "seconde";
		
	var v = [dagen.toString() + " " + dagens,
	         uren.toString() + " " + urens,
	         minuten.toString() + " " + minutens,
	         seconden.toString() + " " + secondens];

	if(dagen == 0) {
		if(uren == 0) {
			if(minuten == 0)
				v = v.slice(3);
			else
				v = v.slice(2);
		} else
			v = v.slice(1);
	}

	objById('lustrumCountDown').innerHTML =
		humane_enum(v) +
		(neg ? " in het Lustrum!" : " tot het Lustrum!");
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

