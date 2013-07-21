function action() {
	alert("Tadam !");
}


// Toutes les 1000 millisecondes, Tadam !
// Au bout de 3500 millisecondes, on arrete ça.

var timeout = setInterval(action, 1000);

setTimeout(
	function() {
		clearTimeout(timeout);
	},
	3500
);
