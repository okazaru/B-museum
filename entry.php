<?php
if(!isset($_COOKIE['e-count']) ){
  //初回アクセス時
  $count = 1;
}else{
  //2回目以降
  $count = $_COOKIE['e-count'] + 1;
}
//クッキーを発行
setcookie('e-count', $count);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<title>B-museum</title>
<meta charset="utf-8">
<meta name="description" content="ボタンで作るお絵描き博物館B-museum！色んな絵をたくさんの人と共有しよう！！">
<link rel="stylesheet" href="riset.css">
<link rel="stylesheet" href="entry.css">
</head>
<?php
$access = htmlspecialchars($count, ENT_QUOTES, 'UTF-8');
$accessCount = json_encode($access);
echo "<script>console.log('$accessCount');</script>";
?>

<p>
Welcome to B-museum<span class="fadein dot01">.</span><span class="fadein dot02">.</span><span class="fadein dot03">.</span><span class="fadein dot04">.</span>
</p>
<form action="https://users2.kyoto-kcg.ac.jp/~st041702/B-museum/buttons.php" method="POST"> 
<div class="parts">
<label for="name">名前(ニックネーム)：</label>
<input type="text" id="name-d" name="account-name" required>
</div>
<div class="parts">
<label for="sex">性別：</label>
<input type="radio" id="man-d" name="sex">男性
<input type="radio" id="woman-d" name="sex">女性
</div>
<div class="parts">
</div>
<div id="sub">
<input type="submit" id="entry-d" name="entry" value="入室">
</div>

</form>

