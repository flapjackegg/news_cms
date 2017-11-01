<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>用户操作</title>
 </head>
 <body>
 	<form action="/index.php/Home/User/mod" method="post">
		用户名：<input type="text" name="username" disabled value="<?php echo ($user["username"]); ?>"><br>
		密&nbsp;&nbsp;&nbsp;码：<input type="text" name="password"><br>	
		邮&nbsp;&nbsp;&nbsp;箱：<input type="text" name="email" value="<?php echo ($user["email"]); ?>"><br>	
		手机号：<input type="text" name="tel" value="<?php echo ($user["tel"]); ?>"><br>
		性&nbsp;&nbsp;&nbsp;别：<input type="radio" name="sex" value="男" <?php echo ($user['sex'] == '男' ? 'checked' : ''); ?>>男
		<input type="radio" name="sex" value="女" <?php echo ($user['sex'] == '女' ? 'checked' : ''); ?>>女
		<input type="radio" name="sex" value="未知" <?php echo ($user['sex'] == '未知' ? 'checked' : ''); ?>>未知<br>
		<input type="hidden" name="id" value="<?php echo ($user["id"]); ?>">
		<input type="submit" value="修改">
 	</form>
 </body>
 </html>