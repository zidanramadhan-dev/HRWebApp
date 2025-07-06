<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>README - HRWebApp</title>
  <style>
    body {
      font-family: sans-serif;
      line-height: 1.6;
      max-width: 900px;
      margin: auto;
      padding: 20px;
      background-color: #f8f9fa;
      color: #212529;
    }
    h1, h2, h3 {
      color: #007BFF;
    }
    code {
      background-color: #e9ecef;
      padding: 2px 6px;
      border-radius: 4px;
    }
    pre {
      background-color: #e9ecef;
      padding: 10px;
      overflow-x: auto;
      border-radius: 5px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1em;
    }
    th, td {
      border: 1px solid #dee2e6;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f1f3f5;
    }
  </style>
</head>
<body>

  <h1>HRWebApp</h1>
  <p><strong>HRWebApp</strong> adalah aplikasi manajemen sumber daya manusia berbasis web, dirancang untuk membantu proses HR seperti pengelolaan data karyawan, absensi, dan pembuatan laporan.</p>

  <h2>🎯 Fitur Utama</h2>
  <ul>
    <li>📋 Manajemen Data Karyawan</li>
    <li>🕒 Pencatatan Absensi</li>
    <li>🗂️ Manajemen Departemen / Divisi</li>
    <li>📊 Laporan HRD</li>
    <li>🔐 Autentikasi & Hak Akses</li>
  </ul>

  <h2>🧰 Teknologi yang Digunakan</h2>
  <ul>
    <li>PHP Native</li>
    <li>MySQL</li>
    <li>HTML & CSS (Bootstrap)</li>
    <li>JavaScript</li>
  </ul>

  <h2>🛠️ Instalasi</h2>
  <ol>
    <li>Clone atau ekstrak file ke dalam folder <code>htdocs</code> (XAMPP) atau <code>www</code> (Laragon/WAMP).</li>
    <li>Buat database baru di <code>phpMyAdmin</code>, lalu import file <code>database.sql</code> jika ada.</li>
    <li>Edit file konfigurasi koneksi database (misal <code>config.php</code>):</li>
  </ol>

  <pre><code>&lt;?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "nama_database";
?&gt;</code></pre>

  <p>4. Akses aplikasi melalui browser: <code>http://localhost/HRWebApp</code></p>

  <h2>👤 Hak Akses Default</h2>
  <table>
    <thead>
      <tr>
        <th>Role</th>
        <th>Username</th>
        <th>Password</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Admin</td>
        <td>admin</td>
        <td>admin123</td>
      </tr>
      <tr>
        <td>HR Staff</td>
        <td>hr</td>
        <td>hr123</td>
      </tr>
    </tbody>
  </table>

  <h2>📁 Struktur Direktori (Contoh)</h2>
  <pre><code>HRWebApp/
├── assets/
├── config/
├── pages/
├── includes/
├── index.php
└── ...</code></pre>

  <h2>📌 Catatan</h2>
  <ul>
    <li>Pastikan XAMPP atau server lokal Anda dalam keadaan aktif.</li>
    <li>Jika ada error, cek kembali konfigurasi database atau struktur folder.</li>
  </ul>

</body>
</html>
