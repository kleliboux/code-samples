function Voiture(marque, modele) {
	this.marque = marque;
	this.modele = modele;
}
Voiture.prototype.afficher = function() {
	alert(this.marque + " " + this.modele);
}
var maCaisse1 = new Voiture("Ford", "Fiesta");
var maCaisse2 = new Voiture("Renault", "Espace");
maCaisse1.afficher();
maCaisse2.afficher();