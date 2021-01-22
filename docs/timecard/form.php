<hr>
<form name="post" method="post" action=".">
<!--名前は後でDB元のプルダウンに変更-->
  名前：<input type="text" name="name"><br>
  区分：
  <select name='category'>
    <option value="出勤">出勤</option>
    <option value="退勤">退勤</option>
  </select>
  <input type="submit" value="送信">
</form>