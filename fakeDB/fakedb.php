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

function getTotalPengeluaran()
{
  $allTransactions = getAllTransactions();
}
