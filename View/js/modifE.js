function validS(){
    var emailPattern = /^[^\s@]+@[^\s@]+\.(com|fr)$/;
    var mail = document.getElementById("emailI").value.trim();
    if(!emailPattern.test(mail)){

    }else{
    document.getElementById("formValidated").value = "1";
    document.getElementById("myForm").submit();
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