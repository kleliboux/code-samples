function Voiture(marque, modele) {
	this.marque = marque;
	this.modele = modele;
}
Voiture.prototype.afficher = function() {
	alert(this.marque + " " + this.modele);
}
var maCaisse = new Voiture("Ford", "Fiesta"); 

console.log("--- Test 1 ---");
for( var prop in maCaisse ) {
	console.log( prop + ": " + maCaisse[prop] );
}

console.log("--- Test 2 ---");
for( var prop in maCaisse ) {
	if( maCaisse.hasOwnProperty(prop) ) {
		console.log( prop + ": " + maCaisse[prop] );
	}
}

