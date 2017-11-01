<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>用户操作</title>
 </head>
 <body>
 	<form action="/index.php/Home/User/add" method="post">
		用户名：<input type="text" name="username"><br>
		密&nbsp;&nbsp;&nbsp;码：<input type="text" name="password"><br>	
		邮&nbsp;&nbsp;&nbsp;箱：<input type="text" name="email"><br>	
		手机号：<input type="text" name="tel"><br>
		<input type="radio" name="sex" value="男">男
		<input type="radio" name="sex" value="女">女<br>
		<input type="submit" value="提交">
 	</form>
 </body>
 </html>