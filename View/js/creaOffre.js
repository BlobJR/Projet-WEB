function valid(){
    var intitule=document.getElementById("intituleI").value.trim();
    var niveau=document.getElementById("lvlI").value.trim();
    var secteur=document.getElementById("secteurS").value
    var place=document.getElementById("nbrPlaceI").value.trim();
    var comp=document.getElementById("compRequisesI").value.trim();
    if(intitule==="" || niveau==="" ||secteur==="Choisissez une option" ||place==="" ||comp===""){
        alert("Tous les champ doivent être remplis")
    }else {
        document.getElementById("formValidated").value = "1";
        document.getElementById("myForm").submit();
        alert("ok")
    }
}

