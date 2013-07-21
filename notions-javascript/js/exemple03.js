function afficher(message)
{
    console.log("Message: " + message); 
    document.getElementById("special3").innerHTML = message;
}

function calculerEtAfficher(cote, affichage)
{
    var resultat = 4 * cote; 
    affichage("Périmètre du carré : " + resultat);
}

calculerEtAfficher(10, afficher); 
