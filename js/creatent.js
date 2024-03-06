function valid(){
    var nom=document.getElementById("nomEntI").value.trim();
    var secteur=document.getElementById("secteur").value;
    var datecrea=document.getElementById("dateCreaI").value.trim();
    
    if(nom==="" || secteur==="Choisissez une option"||datecrea===""){
        alert("Tous les champ doivent être remplis")
    }else {
        window.location.href = 'https://www.javatpoint.com/ethical-hacking-environment-setup';
    }
}
