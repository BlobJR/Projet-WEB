function valid() {
    var mail = document.getElementById("emailI").value.trim();
    var mdp = document.getElementById("mdpI").value.trim();
    var nom=document.getElementById("nomI").value.trim();
    var prenom=document.getElementById("prenomI").value.trim();
    var msgemail = document.getElementById("emailmsg");
    var msgmdp = document.getElementById("mdpmsg");
    var emailPattern = /^[^\s@]+@[^\s@]+\.(com|fr)$/;
    var isValid = false;
    var isFull=true;
   if(nom==="" || prenom===""||mail==="" || mdp===""){
    isFull=false;
    alert("Tous les champs doivent être remplis")
   }
if (!emailPattern.test(mail)) {
        msgemail.textContent = "Adresse email invalide";
    } else {
        if(isFull===true){
        msgemail.textContent = ""; 
        isValid = true; 
        }
    }


    if (isValid) {
        
        console.log("C bon")
    }
}

function verifmail(input){
    var emailPattern = /^[^\s@]+@[^\s@]+\.(com|fr)$/;
    var msgemail=document.getElementById("emailmsg");
    if (input.value.trim() === "") {
        msgemail.textContent = "";
    } else if (emailPattern.test(input.value)) {
        msgemail.textContent = "";
    } else {
        msgemail.textContent = "Adresse email invalide";
    }
}
