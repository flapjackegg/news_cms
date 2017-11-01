<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>用户操作</title>
 </head>
 <body>
 	<form action="/index.php/Home/User/index" method="get">
 		用户名：<input type="text" name="username" value="<?php echo $_GET['username']?>">
 		<input type="submit" name="" value="搜索">
 		
 	</form>
 	<table border="1px" width="100%">
 		<tr>
 			<th>ID</th>
 			<th>username</th>
 			<th>pass</th>
 			<th>email</th>
 			<th>tel</th>
 			<th>性别</th>
 			<th>创建时间</th>
 			<th>操作</th>
 		</tr>
 		<?php if(is_array($user)): foreach($user as $key=>$user): ?><tr style="text-align: center">
 			<td><?php echo ($user["id"]); ?></td>
 			<td><?php echo ($user["username"]); ?></td>
 			<td><?php echo ($user["password"]); ?></td>
 			<td><?php echo ($user["email"]); ?></td>
 			<td><?php echo ($user["tel"]); ?></td>
 			<td><?php echo ($user["sex"]); ?></td>
 			<td><?php echo ($user["createTime"]); ?></td>
 			<td><a href="/index.php/Home/User/mod/id/<?php echo ($user["id"]); ?>">修改</a> <a onclick="return confirm('你确定要删除吗？')" href="/index.php/Home/User/del/id/<?php echo ($user["id"]); ?>">删除</a></td>
 		</tr><?php endforeach; endif; ?>
 		<tr>
 			<td>
 				<a href="/index.php/Home/User/add">添加用户</a>
 			</td>
 		</tr>
 	</table>
 </body>
 </html>