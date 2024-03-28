const mysql = require('mysql2');
const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
const port = 25565;
const connection = mysql.createConnection({
    host: 'localhost',
    port: 3306,
    user: 'root',
    password: '',
    database: 'projet'
});

connection.connect((err) => {
    if (err) {
        console.error('Erreur de connexion à la base de données:', err);
    } else {
        console.log('Database Linked !');
    }
});
connection.connect();
app.use(cors());
app.use(bodyParser.json());

app.listen(port, () => {
    console.log(`Serveur listening to ${port}`);
});

function SQL(Request){
    return new Promise((resolve, reject) => {
        connection.query(Request, (error, results, fields) => {
            if (error) {
                reject(error);
            } else {
                resolve(results);
            }
        });
    });
};
app.get('/auth/login/:password/:user', async (req, res) => {
    const mail = req.params.user;
    const pass = req.params.password;



    try {
        result = await SQL(`SELECT role FROM personne WHERE email = '${mail}' AND mdp= '${pass}'`);
        result=result[0].role
    } catch (error) {
        res.status(500).json({ success: false, error: "Une erreur s'est produite lors de la récupération des données utilisateur." });
    }
    console.log("Cest un :"+result)
    if(result=="Admin"){
        res.send("Admin");
    }
    if(result=="Student"){
        res.send("Student")

    }
    if(result=="Pilote"){
        res.send("Pilote")
    }

    
});