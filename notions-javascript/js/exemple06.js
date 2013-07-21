function Voiture(marque, modele) {
	this.marque = marque;
	this.modele = modele;
	this.afficher = function() {
		alert(this.marque + " " + this.modele);
	}
}

var maVoiture = new Voiture("Ford", "Fiesta");
maVoiture.afficher();
console.log(maVoiture.marque);

// Ajout de membre a posteriori
maVoiture.km = 8000;
maVoiture.rouler = function(distance) {
	this.km += distance;
}

maVoiture.rouler(350);

// Utilisation des crochets
 console.log( maVoiture["km"] );
