<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>yomi's Junk</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
<form name="calcForm">
<table border="1" bgcolor="#BDB76B">
<tr>
<td align="center" colspan="4" bgcolor="#333333"><font color="#FFFFFF">
<strong> 電　卓</font></strong></td>
</tr>
<tr>
<td colspan="4"><input style="text-align:right;" type="text" size="12" name="calcResult" value="0" readonly="readonly"></td>
</tr>
<tr>
<td align="center"><input type="button" name="clearButton" value="AC" onclick="pushClearButton()"></td>
<td align="center"><input type="button" value="+/-" onclick="pushMinus()"></td>
<td align="center"><input type="button" value="％" onclick="pushPerse()"></td>
<td align="center"><input type="button" value="÷" onclick="pushOperator('/')"></td>
</tr>
<tr>
<td align="center"><input type="button" value=" ７ " onclick="pushValue(7)"></td>
<td align="center"><input type="button" value=" ８ " onclick="pushValue(8)"></td>
<td align="center"><input type="button" value=" ９ " onclick="pushValue(9)"></td>
<td align="center"><input type="button" value=" × " onclick="pushOperator('*')"></td>
</tr>
<tr>
<td align="center"><input type="button" value=" ４ " onclick="pushValue(4)"></td>
<td align="center"><input type="button" value=" ５ " onclick="pushValue(5)"></td>
<td align="center"><input type="button" value=" ６ " onclick="pushValue(6)"></td>
<td align="center"><input type="button" value=" － " onclick="pushOperator('-')"></td>
</tr>
<tr>
<td align="center"><input type="button" value=" １ " onclick="pushValue(1)"></td>
<td align="center"><input type="button" value=" ２ " onclick="pushValue(2)"></td>
<td align="center"><input type="button" value=" ３ " onclick="pushValue(3)"></td>
<td align="center"><input type="button" value="＋" onclick="pushOperator('+')"></td>
</tr>
<tr>
<td align="center"  colspan="2" ><input type="button" value=" ０ " onclick="pushValue(0)"class="zero"></td>
<td align="center"><input type="button" value=" ・ " onclick="pushValue('.')"></td>
<td align="center"><input type="button" value="＝" onclick="pushOperator('=')"></td>
</tr>
</table>
</form>
<script src="js/calculator.js"></script>
</body>
</html>