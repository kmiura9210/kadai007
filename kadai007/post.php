<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>世論調査</title>
</head>

<body>
    <h1>世論調査</h1>
    <h2>世論調査にご協力お願いいたします。</h2>
    <form action="write.php" method="post">
        あなたの年代： <select name="age" required>
            <option>10代</option>
            <option>20代</option>
            <option>30代</option>
            <option>40代</option>
            <option>50代</option>
            <option>60代</option>
            <option>70代以上</option>
        </select><br>
        性別：
        <input type="radio" name="sex" value="male" required> 男
        <input type="radio" name="sex" value="female" required> 女<br>
        現在の政権を支持するか？：
        <input type="radio" name="support" value="supportYes" required> はい
        <input type="radio" name="support" value="supportNo" required> いいえ<br>
        支持政党：
        <select name="favParty" required>
            <option>自由民主党</option>
            <option>立憲民主党</option>
            <option>日本維新の会</option>
            <option>公明党</option>
            <option>共産党</option>
            <option>国民民主党</option>
            <option>支持政党なし</option>
        </select><br>
        <input type="submit" value="送信">
    </form>
</body>

</html>