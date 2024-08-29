const express = require('express');
const mysql = require('mysql2');
const cors = require('cors');

const app = express()
const port = 3000;

//Middleware
app.use(cors());
app.use(express.json());

//Koneksi Database
const pool = mysql.createPool({
    host: 'localhost',
    user: 'root',//Penyesuaian username database (Default root)
    password: '',//Default password kosong
    database: 'accesstrack'
});

//Endpoint to get data
app.get('/api/pengajuan_ka', (req, res) => {
    pool.query('SELECT * FROM pengajuan_ka', (error, result) => {
        if (error) {
            return res.status(500).json({ error: error.message });
        }
        res.json(result);
    });
});

//Start server
app.listen(port, () => {
    console.log('Server running on http://localhost:$(port)');
})