 function noteappear() {
    document.getElementById('noteInput').style.display = 'block';
};

function validN() {
    var note = document.getElementById('note').value;
    evaluerEntreprise(note);
};

function evaluerEntreprise(note) {
    alert("La note de l'entreprise est : " + note);
}