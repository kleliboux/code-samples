function calculerEtAfficher(cote, affichage)
{
    var resultat = 4 * cote; 
    affichage("Périmètre du carré : " + resultat);
}

function creeAffichage(id) {
    return function(message) {    
        console.log("Message: " + message); 
        document.getElementById(id).innerHTML = message;
    }
}

// Création de la fonction
var monAffichage = creeAffichage("special1")

// Appel de cette fonction créée
monAffichage("Du contenu tout frais !");

// Création et appel en une seule ligne
creeAffichage("special2")("Du contenu tout frais !");

// Création et passage en paramètre en une seule ligne
calculerEtAfficher(10, creeAffichage("special3")); 
