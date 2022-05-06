<?php
require_once "fakeDB/fakedb.php";
$bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
$database = getAllTransactions();
?>

<div class="table-container">
  <div class="main-table">
    <table>
      <thead>
        <tr>
          <th>Waktu</th>
          <th>Transaksi</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($database as $index => $transaksi) : ?>
          <tr>
            <?php
            $date = explode("-", $transaksi['date']);
            $date[1] = $bulan[intval($date[1]) + 1];
            $isPendapatan = $transaksi["tipeTransaksi"] == "pendapatan";
            ?>
            <td><?= implode(" ", $date); ?></td>
            <td class="<?= $isPendapatan ? "font-green" : "font-red"; ?>">
              <?= ($isPendapatan ? "+" : "-") . " Rp. " . $transaksi['nominal']; ?>
            </td>
            <td><?= $transaksi['keterangan']; ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <div class="tabel-total">
    <table>
      <tr>
        <td>Total Pendapatan</td>
        <td>Rp. 23.000.000,00</td>
      </tr>
      <tr>
        <td>Total Pengeluaran</td>
        <td>Rp. 23.000.000,00</td>
      </tr>
      <tr>
        <td>Total Saldo</td>
        <td>Rp. 23.000.000,00</td>
      </tr>
    </table>
  </div>
</div>