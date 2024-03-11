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
        sendData();
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
function sendData(){
    var user = document.getElementById('emailI').value
    var password = document.getElementById('mdpI').value

    fetch(`http://localhost:25565/auth/login/${password}/${user}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.text())
    .then(data => {
        console.log(data)
        if(data == "Student"){
            window.location.href = 'dashboard.html';
            console.log(data);
        }
        if(data == "Pilote"){
            window.location.href = 'dashboard-admin.html';
            console.log(data);
        }
        if(data == "Admin"){
            window.location.href = '/html/test.html';
            console.log(data);
        }
        if(data!=="Admin" && data!=="Pilote" && data!=="Student"){
            alert("nom d'utilisateur ou mot de passe incorrect")
        }
    })
};
