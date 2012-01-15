function email(t, d, u) {
	var email = u + '@' + d + '.' + t;
	document.write('<a href="mailto:' + email + '">' + email + '</a>');
}

function common_init() {
	var els = document.getElementsByTagName('input');
	for(var i = 0; i < els.length; i++) {
		if(els[i].getAttribute('placeholder')) {
			placeholder_init(els[i]);
		}
	}
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

function placeholder_init(el) {
	var text = el.getAttribute('placeholder');
	if(text) {
		el.onfocus = function() {
			placeholder_onfocus(el);
		};
		el.onblur = function() {
			placeholder_onblur(el);
		}
		if(!el.form.onsubmit) {
			el.form.onsubmit = function() {
				var els = el.form.getElementsByTagName('input');
				for(var i = 0; i < els.length; i++) {
					if(els[i].getAttribute('placeholder') && els[i].className.match(/placeholder/)) {
						els[i].value = '';
					}
				}
			}
		}
		if(text == el.value || el.value == '') {
			el.className += ' placeholder';
			el.value = text;
			el.origType = el.type;
			el.type = 'text';
		}
	}
}

function placeholder_onfocus(el) {
	var text = el.getAttribute('placeholder');
	if(text) {
		if(el.className.match(/placeholder/)) {
			el.className = el.className.replace(/ placeholder/, '');
			el.type = el.origType;
			el.value = '';
		}
	}
}

function placeholder_onblur(el) {
	var text = el.getAttribute('placeholder');
	if(text) {
		if(el.value == '') {
			el.className += ' placeholder';
			el.value = text;
			el.origType = el.type;
			el.type = 'text';
		}
	}
}
