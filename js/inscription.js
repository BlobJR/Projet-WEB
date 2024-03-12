function valid(){
    var mail=document.getElementById("emailInput").value.trim();
    var mdp=document.getElementById("mdpInput").value.trim();
    var nom=document.getElementById("nomInput").value.trim();
    var prenom=document.getElementById("prenomInput").value.trim();
    if(mdp==="" || mail===""||nom===""||prenom===""){
        alert("Tous les champ doivent être remplis")
    }else {
        window.location.href = 'https://www.javatpoint.com/ethical-hacking-environment-setup';
    }
}
function verifmail(input){
    var emailPattern = /^[^\s@]+@[^\s@]+\.(com|fr)$/;
    var msgemail=document.getElementById("msg");
    if (input.value.trim() === "") {
        msgemail.textContent = "";
    } else if (emailPattern.test(input.value)) {
        msgemail.textContent = "";
    } else {
        msgemail.textContent = "Adresse email invalide";
    }
}
