function externe() {
	var a = 7;
	var interne = function() {
		alert(a);
	}
	a = 8;
	return interne;
}

externe()();
