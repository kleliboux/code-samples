// Voiture hérite de Produit

function Produit(nom, prix) {
	this.nom = nom;
	this.prix = prix;
}
Produit.prototype.afficher = function() {
	console.log(this.nom + " coûte " + this.prix + " euros");
}

function Voiture(marque, modele, prix) {
	
	// Appel du constructeur de produit
	Produit.call(this, marque + " " + modele, prix);

	this.marque = marque;
	this.modele = modele;
}

// Le prototype est un objet "modele", ici mon modèle est Produit
Voiture.prototype = new Produit();

// D'autres méthodes spécifiques à la voiture
Voiture.prototype.rouler = function() {
	console.log(this.nom + " roule...");
}

var monProduit = new Produit("Trombone", 0.3);
var maCaisse = new Voiture("Ford", "Fiesta", 12000);

console.log(monProduit instanceof Produit);
console.log(monProduit instanceof Voiture);
console.log(maCaisse instanceof Produit);
console.log(maCaisse instanceof Voiture);

maCaisse.afficher();
maCaisse.rouler();

monProduit.afficher();
console.log(monProduit.marque);   // undefined
monProduit.rouler(); // erreur
