<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylecreaent.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600&display=swap">
    <title>Créer une Entreprise</title>
    <link rel="icon" href="../img/capsule_w.png" type="image/x-icon">
    <script src="../js/creatent.js"></script>
</head>

<body>
    <header class="header1">
        <a href="https://www.youtube.com/watch?v=d_WjOBeLVn0&t=299s&ab_channel=EGO">
        <img src="../img/logopng.png" alt="Logo">
    </a>
    </header>
    
    
    <header class="header2">
        <form >
            <input type="text" placeholder="Nom de l'Entreprise" id="nomEntI">
            <span id="msgNom" class="msg"></span>
            <input type="text" placeholder="Secteur de l'Entreprise" id="secteurI">
            <span id="msgSecteur" class="msg"></span>
            <input type="text" placeholder="Date de création " id="datecreationI">
            <span id="msgDate" class="msg"></span>
            <button type="button" class="btn-53" onclick="validI()">
              Créer
              </button>
            </form>

             
    </header>
    <header class="creation">
             <p>Création</p>
             <p>d'Entreprise</p>
    </header>
    
</body>
</html>