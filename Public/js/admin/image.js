/**
 * 
 */
$(function() {
    $('#file_upload').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
        'fileTypeExts': '*.gif; *.jpg; *.png',
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response) {
                var obj = JSON.parse(data);
                console.log(data);
                $('#' + file.id).find('.data').html('上传成功');
                $("#upload_org_code_img").attr("src",obj.data);
                $("#file_upload_image").attr('value',obj.data);
                $("#upload_org_code_img").show();
            }else{
                alert('上传失败');
            }
        },
    });
});
