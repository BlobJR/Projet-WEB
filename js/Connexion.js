function valid(){
    var mail=document.getElementById("emailI").value.trim();
    var mdp=document.getElementById("mdpI").value.trim();
    var msgemail=document.getElementById("emailmsg");
    var msgmdp=document.getElementById("mdpmsg");
    if(mdp==="" || mail===""){
        if(mdp===""){
            msgmdp.textContent="Le champ mot de passe ne peut être vide chef"
        }
        if(mail===""){
            msgemail.textContent="Le champ email ne peut être vide chef"
        }
    }else {
        window.location.href = 'https://www.javatpoint.com/ethical-hacking-environment-setup';
    }
}
function validemail(input){
    var emailPattern = /^[^\s@]+@[^\s@]+\.(com|fr)$/;
    var msgemail=document.getElementById("emailmsg");
    if (emailPattern.test(input.value)) {
        // Email valide
        msgemail.textContent = "";
    } else {
        
        msgemail.textContent = "Adresse email invalide";
      
    }
}

