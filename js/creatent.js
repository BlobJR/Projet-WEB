function validI(){
    var nomE=document.getElementById("nomEntI").value.trim();
    var secteur=document.getElementById("secteurI").value.trim();
    var date=document.getElementById("datecreationI").value.trim();
    var msgNom=document.getElementById("msgNom");
    var msgSecteur=document.getElementById("msgSecteur");
    var msgdate=document.getElementById("msgDate");
    if (nomE===""|| secteur==="" || date===""){
        if(nomE===""){
            msgNom.textContent="Ce champ ne peut être vide"
        }if (secteur===""){
            msgSecteur.textContent="Ce champ ne peut être vide"
        }if(date===""){
            msgdate.textContent="Ce champ ne peut être vide"
        }
    }else{
        window.location.href='https://zubkostudio.com/'
    }
}
function getcp(){
    var ville=document.getElementById("villeI").value
    var request= new XMLHttpRequest();
    var inputcp=document.getElementById("cpI")
    inputcp.value=""
    console.log(ville);
    console.log("https://vicopo.selfbuild.fr/ville/argel?city="+ville)
    request.open("GET","https://vicopo.selfbuild.fr/ville/argel?city="+ville,true);
    request.onload=  function(){
        if(request.status==200){
            var response = JSON.parse(request.response);
            var citie=response.cities;
        if (citie.length > 0) {
            for(i=0;i<citie.length;i++){
                if(citie[i].city.toLowerCase()==ville.toLowerCase()){
                var codePostal = citie[i].code;
                console.log("Code postal de " + ville + " : " + codePostal);
                inputcp.value=codePostal;
               
                // Vous pouvez utiliser codePostal comme bon vous semble ici
                }
            }
        } else {
            console.log("Aucun code postal trouvé pour " + ville);
        }
    }else{
        console.log("requete cassée")
    }
};
request.send();
}