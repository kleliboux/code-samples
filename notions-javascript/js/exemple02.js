// déclaration de la fonction 
function afficher(id, message)
{
    console.log("Message: " + message); 
    document.getElementById(id).innerHTML = message;
}

// deux exemples d'appel
afficher("special1", "Du contenu bien frais !");
afficher("special2", "Un autre contenu."); 


// déclaration d'une autre fonction 
function perimetre(longueur, largeur)
{
	return 2 * (longueur + largeur);
}

// appel imbriqué des deux fonctions précédentes
afficher("special3", "Périmètre du rectangle : " + perimetre(100, 40) );

// déclaration de la fonction suivi de l’appel 
(function(id, message) {
    console.log("Message: " + message); 
    document.getElementById(id).innerHTML = message;
}("special4", "Un dernier contenu.")); 

 