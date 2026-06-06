<?php
include 'koneksi.php';

$total = mysqli_query($conn,"SELECT * FROM booking");
$total = mysqli_num_rows($total);

$pending = mysqli_query($conn,"SELECT * FROM booking WHERE status_booking='Pending'");
$pending = mysqli_num_rows($pending);

$confirm = mysqli_query($conn,"SELECT * FROM booking WHERE status_booking='Dikonfirmasi'");
$confirm = mysqli_num_rows($confirm);

$data = mysqli_query($conn,"SELECT * FROM booking ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard - Dinzz Haircutt</title>

<style>

body{
    margin:0;
    font-family:Poppins;
    background:#0b0b0b;
    color:white;
}

/* HEADER */
.header{
    padding:20px;
    background:#111;
    text-align:center;
    border-bottom:2px solid #f5b041;
}

.header h1{
    color:#f5b041;
}

/* STATS */
.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:15px;
    padding:20px;
}

.card{
    background:#1a1a1a;
    padding:20px;
    border-radius:12px;
    text-align:center;
    border:1px solid #222;
}

.card h2{
    color:#f5b041;
    margin:0;
}

/* TABLE */
.table-box{
    padding:20px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#1a1a1a;
    border-radius:10px;
    overflow:hidden;
}

th{
    background:#f5b041;
    color:black;
    padding:12px;
}

td{
    padding:12px;
    border-bottom:1px solid #333;
    text-align:center;
}

/* STATUS */
.status{
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
}

.pending{
    background:orange;
    color:black;
}

.confirm{
    background:limegreen;
    color:black;
}

/* BUTTON */
.btn{
    padding:6px 10px;
    border-radius:6px;
    text-decoration:none;
    color:white;
    background:#27ae60;
    font-size:12px;
}

@media(max-width:768px){
    table{font-size:12px;}
}

</style>

</head>

<body>

<div class="header">
<h1>ADMIN DINZZ HAIRCUTT</h1>
</div>

<!-- STATISTICS -->
<div class="stats">

<div class="card">
<h2><?= $total; ?></h2>
<p>Total Booking</p>
</div>

<div class="card">
<h2><?= $pending; ?></h2>
<p>Pending</p>
</div>

<div class="card">
<h2><?= $confirm; ?></h2>
<p>Dikonfirmasi</p>
</div>

</div>

<!-- TABLE BOOKING -->
<div class="table-box">

<table>

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>No HP</th>
    <th>Layanan</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_array($data)) { ?>

<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['no_hp']; ?></td>
    <td><?= $row['layanan']; ?></td>
    <td><?= $row['tanggal']; ?></td>
    <td><?= $row['jam']; ?></td>

    <td>
        <?php if($row['status_booking']=="Dikonfirmasi"){ ?>
            <span class="status confirm">Dikonfirmasi</span>
        <?php } else { ?>
            <span class="status confirm">Dikonfirmasi</span>
        <?php } ?>
    </td>

    <td>
        <a class="btn" href="konfirmasi.php?id=<?= $row['id']; ?>">
            Konfirmasi
        </a>
    </td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>