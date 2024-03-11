
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
// function sendData(){
//     var password = document.getElementById('password').value
//     var user = document.getElementById('account-id').value

//     fetch(`http://localhost:25565/auth/login/${password}/${user}`, {
//         method: 'GET',
//         headers: {
//             'Content-Type': 'application/json'
//         }
//     })
//     .then(response => response.text())
//     .then(data => {
//         console.log(data)
//         if(data == "Student"){
//             window.location.href = 'dashboard.html';
//         }
//         if(data == "Pilote"){
//             window.location.href = 'dashboard-admin.html';
//         }
//         if(data == "Admin"){
//             window.location.href = 'dashboard-admin.html';
//         }
//     })
// };