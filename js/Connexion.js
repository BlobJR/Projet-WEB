function valid(){
    var mail=document.getElementById("emailI").value.trim();
    var mdp=document.getElementById("mdpI").value.trim();
    var msgemail=document.getElementById("emailmsg");
    var msgmdp=document.getElementById("mdpmsg");
    if(mdp==="" || mail===""){
        if(mdp===""){
            msgmdp.textContent="Ce champ doit être rempli "
        }
        if(mail===""){
            msgemail.textContent="Ce champ doit être rempli"
        }
    }else {
        window.location.href = 'https://www.javatpoint.com/ethical-hacking-environment-setup';
    }
}
function validemail(input){
    var emailPattern = /^[^\s@]+@[^\s@]+\.(com|fr)$/;
    var msgemail=document.getElementById("emailmsg");
    if (input.value.trim() === "") {
        // Champ d'entrée vide, ne rien faire
        msgemail.textContent = "";
    } else if (emailPattern.test(input.value)) {
        // Email valide
        msgemail.textContent = "";
    } else {
        // Adresse email invalide
        msgemail.textContent = "Adresse email invalide";
    }
}

