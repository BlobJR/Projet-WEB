function valid(){
    var intitule=document.getElementById("intituleI").value.trim();
    var niveau=document.getElementById("lvlI").value.trim();
    var secteur=document.getElementById("secteurI").value.trim();
    if(intitule==="" || niveau===""||secteur===""){
        alert("Tous les champ doivent être remplis")
    }else {
        window.location.href = 'https://www.javatpoint.com/ethical-hacking-environment-setup';
    }
}

