<?php

function getAllTransactions()
{
  $jsonFile = file_get_contents("fakeDB/fakedb.json");
  return json_decode($jsonFile, true);
}

function addTransaction($data)
{
  $allTransactions = getAllTransactions();
  array_push($allTransactions, $data);
  $jsonData = json_encode($allTransactions);
  file_put_contents("fakeDB/fakedb.json", $jsonData);
}

function getTotalPendapatan()
{
  $allTransactions = getAllTransactions();
  function filterPendapatan($val)
  {
    return $val['tipeTransaksi'] == 'pendapatan';
  }
  $filteredTransactions = array_filter($allTransactions, 'filterPendapatan');
  function sumPendapatan($carry, $item)
  {
    $nominal = intval($item['nominal']);
    return $carry + $nominal;
  }
  return array_reduce($filteredTransactions, 'sumPendapatan', 0);
}

function getTotalPengeluaran()
{
  $allTransactions = getAllTransactions();
  function filterPengeluaran($val)
  {
    return $val['tipeTransaksi'] == 'pengeluaran';
  }
  $filteredTransactions = array_filter($allTransactions, 'filterPengeluaran');
  function sumPengeluaran($carry, $item)
  {
    $nominal = intval($item['nominal']);
    return $carry + $nominal;
  }
  return array_reduce($filteredTransactions, 'sumPengeluaran', 0);
}
