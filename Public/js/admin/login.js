/**
 * 前端登录类
 * @type {class}
 * @author Hammer
 */

var login = {
	check : function(){
		var username = $('input[name="username"]').val();
		var password = $('input[name="password"]').val();
		if (!username){
			dialog.error('用户名不能为空');
		}
		if (!password){
			dialog.error('用户名不能为空');
		}

		var url = "login/check";
		var data = {'username':username, 'password':password};

		$.post(url, data, function(result){
			if(result.status == 0){
				return dialog.error(result.mess);
			}

			if(result.status == 1){
				return dialog.success(result.mess, 'index');
			}

		}, "JSON");
	}
}