<?php
// postから受け取る
$age = $_POST['age'];

if ($_POST['sex'] === 'male') {
    $sex = '男性';
} else {
    $sex = '女性';
}

if ($_POST['support'] === 'supportYes') {
    $support = '支持する';
} else {
    $support = '支持しない';
}

$favParty = $_POST['favParty'];

// データの整形
$data = $age . ',' . $sex . ',' . $support . ',' . $favParty . "\n";
$dataDisplay = '<tr><td>' . $age . '</td><td>' . $sex . '</td><td>' . $support . '</td><td>' . $favParty . '</td></tr>' . "\n";

// データ集計
$dataArray = file_get_contents('data/data.txt');

// Q1年齢層
$ageData10s = substr_count($dataArray, '10代');
$ageData20s = substr_count($dataArray, '20代');
$ageData30s = substr_count($dataArray, '30代');
$ageData40s = substr_count($dataArray, '40代');
$ageData50s = substr_count($dataArray, '50代');
$ageData60s = substr_count($dataArray, '60代');
$ageData70s = substr_count($dataArray, '70代以上');
$ageData = array('10代' => $ageData10s, '20代' => $ageData20s, '30代' => $ageData30s, '40代' => $ageData40s, '50代' => $ageData50s, '60代' => $ageData60s, '70代以上' => $ageData70s);

var_dump($dataArray);
echo $ageData;






// $ageData = $age . "\n";
$sexData = $sex . "\n";
$supportData = $support . "\n";
$favPartyData = $favParty . "\n";

// データを保存する
// 表示用データ
file_put_contents('data/dataDisplay.txt', $dataDisplay, FILE_APPEND);

// 集計データ
// 集計結果を追加
file_put_contents('data/data.txt', $data, FILE_APPEND);

// 集計用、質問ごとのデータ
// 一旦クリアして、新規に書き込む
file_put_contents('data/q1.txt', "");
file_put_contents('data/q1.txt', $ageData, FILE_APPEND);
file_put_contents('data/q2.txt', "");
file_put_contents('data/q2.txt', $sexData, FILE_APPEND);
file_put_contents('data/q3.txt', "");
file_put_contents('data/q3.txt', $supportData, FILE_APPEND);
file_put_contents('data/q4.txt', "");
file_put_contents('data/q4.txt', $favPartyData, FILE_APPEND);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ファイル書き込み</title>
</head>

<body>
    <h1>書き込み完了！</h1>

    <ul>
        <li><a href="read.php">確認する</a></li>
        <li><a href="post.php">投稿フォームへ戻る</a></li>
    </ul>
</body>

</html>