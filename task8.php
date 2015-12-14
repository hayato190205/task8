<?php
// N個(Nは1より大きい奇数)の数字が与えられたとき、それらの数字の個数、最大、最小、平均、標準偏差を出力せよ。
// ただし、平均値と標準偏差は、小数点第一位まで出力せよ。
// [実行結果例]
// 90 35 40 40 30
// 最大: 90 最小: 30 平均: 47.0 標準偏差: 21.8

function h($e)
{
  return htmlspecialchars($e, ENT_QUOTES, 'utf-8');
}

function stats_standard_deviation(array $a, $sample = false)
{
  $n = count($a);
  $mean = array_sum($a) / $n;
  $carry = 0.0;
  foreach ($a as $val)
  {
    $d = ((double) $val) - $mean;
    $carry += $d * $d;
  };
  if ($sample)
  {
    --$n;
  }
  return sqrt($carry / $n);
}

$input = array($_POST);
// カンマ区切り、PHP、配列
// N個の数値を入力し、配列に取得する方法がわからない。。。

$N = count($input);
$max = max($input);
$min = min($input);
$ave = array_sum($input)/$N;
$sd = stats_standard_deviation($input);

var_dump($input);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>統計量の計算</title>
  </head>
  <body>
    <h1>統計量の計算</h1>
    <form action="" method="post">
    <input type="text" name="n" min="0">
    <input type="submit" value="送信"><br>
      データ個数:<?php echo h($N); ?><br>
      最大値:<?php echo h($max); ?><br>
      最小値:<?php echo h($min); ?><br>
      平均値:<?php echo h($ave); ?><br>
      標準偏差:<?php echo round(h($sd), 3); ?>
  </body>
  </html>
