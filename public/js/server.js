const express = require('express');
const app = express();
const mysql = require('mysql');

// Membuat koneksi ke database
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'palasaridb'
});

// Membuka koneksi ke database
connection.connect();

// Route untuk mendapatkan data dari database
app.get('/getuser', (req, res) => {
  const query = 'SELECT anggaran, expenditure FROM apb_desas';
  
  connection.query(query, (error, results) => {
    if (error) throw error;

    // Mengirim data sebagai respons
    res.send(results);
  });
});

// Menjalankan server
app.listen(8000, () => {
  console.log('Server berjalan pada port 8000');
});