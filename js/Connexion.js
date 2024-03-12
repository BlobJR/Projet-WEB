function valid(event) {
    event.preventDefault();
    var mail = document.getElementById("emailI").value.trim();
    var mdp = document.getElementById("mdpI").value.trim();
    var msgemail = document.getElementById("emailmsg");
    var msgmdp = document.getElementById("mdpmsg");
    var emailPattern = /^[^\s@]+@[^\s@]+\.(com|fr)$/;
    var isValid = false;
    var isFull=true;
   if(mail==="" || mdp===""){
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
        document.getElementById("myForm").submit();
        console.log("C bon")
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

