<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>发送消息 - QQ消息提醒系统</title><link href="../Public/css/tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" /><link href="../Public/css/css.css" rel="stylesheet" type="text/css" media="screen" /><script type="text/javascript" src="../Public/css/tablecloth/tablecloth.js"></script><script language="javascript" src="../Public/jquery.min.js"></script><script>function myCheck()
            {
               for(var i=0;i<document.apply.elements.length-1;i++)
               {
                  if(document.apply.elements[i].value==""||document.apply.elements[i].value=="http://")
                  {
                     alert("当前表单不能有空项");
                     document.apply.elements[i].focus();
                     return false;
                  }
               }
               return true;

}

function addFile()
{
$('#send').append('<tr><td>发送内容</td><td><textarea  style="width:500px;height:200px;" name="content"></textarea></td></tr>');
}

</script></head><body><div class="main"><div class="head"></div><div class="content"><div class="left" ><table width="100%" id="left" cellspacing="0" cellpadding="0" ><tr align="center"><th><strong>功能选择</strong></th><tr  align="center"><td><a href="<?php echo U('Home/index');?>">提醒列表</a></td></tr><tr  align="center"><td><a href="<?php echo U('Send/index');?>">及时通知</a></td></tr><tr  align="center"><td><a href="<?php echo U('User/index');?>">客户资料</a></td></tr><tr  align="center"><td><a href="<?php echo U('Btype/index');?>">通知类型</a></td></tr><tr  align="center"><td><a href="<?php echo U('Admin/index');?>">密码修改</a></td></tr><tr  align="center"><td><a href="logout.php">安全退出</a></td></tr></table></div><div class="right" ><form name="apply"  action="" method="post" onSubmit="return myCheck()"  ><table  width="100%" border="1"><tbody id="send"><tr align="center" ><th colspan="2"><strong>&nbsp;</strong></th></tr><tr><td style="width:200px;">发送对象：</td><td><select name="user" ><option value="">请选择</option><?php if(is_array($qqname)): $i = 0; $__LIST__ = $qqname;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["realname"]); ?>(<?php echo ($vo["qqnum"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?></select></td></tr><tr><td>通知类型：</td><td><?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><input type="radio" name ="type" value="<?php echo ($type["id"]); ?>" /><?php echo ($type["type"]); ?> |<?php endforeach; endif; else: echo "" ;endif; ?><br/><input onClick="addFile()" type="radio" name ="type" value="0" />自定义通知
	</td></tr></tbody><tr align="center" ><td colspan="2"><input type="submit" value="确认发送"/></td></tr></table></form></div></div><div style="font: 0px/0px sans-serif;clear: both;display: block"></div><div class="foot" align="center"><p>Copyright @ ToryZen Designs</p><p>Powered by ToryZen</p></div></div></body></html>