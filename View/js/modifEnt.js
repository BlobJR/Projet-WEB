function validS(){
   document.getElementById("formValidated").value = "1";
    document.getElementById("myForm").submit();
      
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