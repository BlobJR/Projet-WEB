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