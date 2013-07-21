var monTableau = new Array();

monTableau[0] = "Toto";
monTableau[1] = 17;
monTableau[2] = true;
monTableau[4] = "hello";

console.log(monTableau.length + " éléments :");

for(var i = 0; i < monTableau.length; i++) {
	console.log(monTableau[i]);
}

// Ici : monTableau[3] == undefined
