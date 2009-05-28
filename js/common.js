function email(t, d, u) {
	var email = u + '@' + d + '.' + t;
	document.write('<a href="mailto:' + email + '">' + email + '</a>');
}

function common_init() {
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

