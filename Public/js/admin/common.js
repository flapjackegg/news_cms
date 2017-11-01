/**
 * 添加按钮操作
 * 
 */

$('#button-add').click(function()
{
	var url = SCOPE.add_url;
	//alert(url);
	window.location.href = url;
});

/**
 * 提交表单操作
 * 
 */

$('#singcms-button-submit').click(function()
{
	var data = $('#singcms-form').serializeArray();
	postData = {};

	$(data).each(function()
	{
		postData[this.name] = this.value;
	});
	
	var url = SCOPE.save_url;
	var jump_url = SCOPE.jump_url;

	$.post(url, postData, function(result)
	{
		if(result.status == 1)
		{
			dialog.success(result.mess, jump_url);
		}
		if(result.status == 0)
		{
			dialog.error(result.mess);
		}

	}, 'JSON');
});


$('.singcms-table #singcms-edit').on('click', function()
{
	var id = $(this).attr('attr-id');
	var url = SCOPE.edit_url + '/id/' + id;
	window.location.href=url;
});

$('.singcms-table #singcms-delete').on('click', function()
{
	var url = SCOPE.set_status_url;
	var id = $(this).attr('attr-id');
	var a = $(this).attr('attr-a');
	var message = '你确定要' + $(this).attr('attr-message') + '吗？';
	var data = {};
	data['id'] = id;
	data['status'] = -1;

	layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: message,
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            toDelete(url, data);
        },
    });
});

function toDelete(url, data){
	$.post(url, data, function(result)
	{
		if(result.status == 1)
		{
			return dialog.success(result.mess, '');
		}
		if(result.status == 0)
		{
			return dialog.error(result.mess);
		}
	}, 'JSON');
}






