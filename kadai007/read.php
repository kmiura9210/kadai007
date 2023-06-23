<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./yoron.css">
    <title>投稿済み記事確認</title>
</head>

<body>
    <h2>読込み結果</h2>
    <table id='dataTable'>
        <tr>
            <th>年代</th>
            <th>性別</th>
            <th>現在の政権を支持するか</th>
            <th>支持政党</th>
        </tr>
        <?php
        // ファイルを読み込む
        $data = file_get_contents('data/dataDisplay.txt');
        $dataArray = file_get_contents('data/data.txt');

        //  読み込んだものをブラウザへ表示
        echo nl2br($data);
        ?>
    </table>
    <div>
        <canvas id="q1Graph"></canvas>
        <canvas id="q2Graph"></canvas>
        <canvas id="q3Graph"></canvas>
        <canvas id="q4Graph"></canvas>
    </div>

    <?PHP
    // 元データ読み込み
    $dataArray = file_get_contents('data/data.txt');

    // Q1
    $ageCount = [
        '10代' => substr_count($dataArray, '10代'),
        '20代' => substr_count($dataArray, '20代'),
        '30代' => substr_count($dataArray, '30代'),
        '40代' => substr_count($dataArray, '40代'),
        '50代' => substr_count($dataArray, '50代'),
        '60代' => substr_count($dataArray, '60代'),
        '70代以上' => substr_count($dataArray, '70代以上')
    ];

    $ageCountData = json_encode($ageCount);

    // Q2
    $sexCount = [
        '男性' => substr_count($dataArray, '男性'),
        '女性' => substr_count($dataArray, '女性')
    ];

    $sexCountData = json_encode($sexCount);

    // Q3
    $supportCount = [
        '支持する' => substr_count($dataArray, '支持する'),
        '支持しない' => substr_count($dataArray, '支持しない')
    ];

    $supportCountData = json_encode($supportCount);

    // Q4
    $favPartyCount = [
        '自由民主党' => substr_count($dataArray, '自由民主党'),
        '立憲民主党' => substr_count($dataArray, '立憲民主党'),
        '日本維新の会' => substr_count($dataArray, '日本維新の会'),
        '公明党' => substr_count($dataArray, '公明党'),
        '共産党' => substr_count($dataArray, '共産党'),
        '国民民主党' => substr_count($dataArray, '国民民主党'),
        '支持政党なし' => substr_count($dataArray, '支持政党なし')
    ];

    $favPartyCountData = json_encode($favPartyCount);

    // var_dump($ageCountData);
    //string(37) "{"c1":"red","c2":"yello","c3":"blue"}"

    // テストZone終わり

    $file_name = "data/q1.txt"; /*読込ファイルの指定*/

    // $ret_array = file($file_name); /*ファイルを全て配列に入れる*/
    $ret_array = $ageCount;
    // var_dump($ret_array);
    $ret_array = json_encode($ret_array);
    // print_r($ret_array);
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Q1用データ整形
        let ageData = '<?php echo $ageCountData; ?>';
        console.log(ageData, 'テストテスト');
        ageData = JSON.parse(ageData);
        console.log(ageData, 'JSONテスト');

        let ageKeys = Object.keys(ageData);
        let ageValues = Object.values(ageData);
        console.log(ageKeys, 'keyテスト')
        console.log(ageValues, 'valueテスト');

        // Q2用データ整形
        let sexData = '<?php echo $sexCountData; ?>';
        console.log(sexData, 'テストテスト');
        sexData = JSON.parse(sexData);
        console.log(ageData, 'JSONテスト');

        let sexKeys = Object.keys(sexData);
        let sexValues = Object.values(sexData);
        console.log(sexKeys, 'keyテスト')
        console.log(sexValues, 'valueテスト');

        // Q3用データ整形
        let supportData = '<?php echo $supportCountData; ?>';
        console.log(supportData, 'テストテスト');
        supportData = JSON.parse(supportData);
        console.log(supportData, 'JSONテスト');

        let supportKeys = Object.keys(supportData);
        let supportValues = Object.values(supportData);
        console.log(supportKeys, 'keyテスト')
        console.log(supportValues, 'valueテスト')

        // Q4用データ整形
        let favPartyData = '<?php echo $favPartyCountData; ?>';
        console.log(favPartyData, 'テストテスト');
        favPartyData = JSON.parse(favPartyData);
        console.log(favPartyData, 'JSONテスト');

        let favPartyKeys = Object.keys(favPartyData);
        let favPartyValues = Object.values(favPartyData);
        console.log(favPartyKeys, 'keyテスト');
        console.log(favPartyValues, 'valueテスト');


        // Q1グラフのデータ
        const q1GraphData = document.getElementById('q1Graph');

        new Chart(q1GraphData, {
            type: 'bar',
            data: {
                // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                labels: ageKeys,
                datasets: [{
                    label: '# of Votes',
                    data: ageValues,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Q2グラフのデータ
        const q2GraphData = document.getElementById('q2Graph');

        new Chart(q2GraphData, {
            type: 'bar',
            data: {
                // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                labels: sexKeys,
                datasets: [{
                    label: '# of Votes',
                    data: sexValues,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Q3グラフのデータ
        const q3GraphData = document.getElementById('q3Graph');

        new Chart(q3GraphData, {
            type: 'bar',
            data: {
                // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                labels: supportKeys,
                datasets: [{
                    label: '# of Votes',
                    data: supportValues,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Q4グラフのデータ
        const q4GraphData = document.getElementById('q4Graph');

        // new Chart(q4GraphData, {
        //     type: 'bar',
        //     data: {
        //         // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        //         labels: favPartyKeys,
        //         datasets: [{
        //             label: '# of Votes',
        //             data: favPartyValues,
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });

        new Chart(q4GraphData, {
            type: 'doughnut',
            data: {
                // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                labels: favPartyKeys,
                datasets: [{
                    label: '# of Votes',
                    data: favPartyValues,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(23, 162, 235)',
                        'rgb(64, 162, 235)',
                        'rgb(85, 162, 235)',
                        'rgb(34, 162, 235)',
                        'rgb(1, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            }
        });
    </script>
    <ul>
        <li><a href="post.php">投稿フォームへ戻る</a></li>
    </ul>
</body>

</html>