<?php if (!defined('THINK_PATH')) exit(); session_start();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>客户资料添加 - QQ消息提醒系统</title><link href="../Public/css/tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" /><link href="../Public/css/css.css" rel="stylesheet" type="text/css" media="screen" /><script type="text/javascript" src="../Public/css/tablecloth/tablecloth.js"></script><script>function myCheck()
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
</script></head><body><div class="main"><div class="head"></div><div class="content"><div class="left" ><table width="100%" id="left" cellspacing="0" cellpadding="0" ><tr align="center"><th><strong>功能选择</strong></th><tr  align="center"><td><a href="<?php echo U('Home/index');?>">提醒列表</a></td></tr><tr  align="center"><td><a href="<?php echo U('Send/index');?>">及时通知</a></td></tr><tr  align="center"><td><a href="<?php echo U('User/index');?>">客户资料</a></td></tr><tr  align="center"><td><a href="<?php echo U('Btype/index');?>">通知类型</a></td></tr><tr  align="center"><td><a href="<?php echo U('Admin/index');?>">密码修改</a></td></tr><tr  align="center"><td><a href="logout.php">安全退出</a></td></tr></table></div><div class="right"><form name="apply"  action="" method="post" onSubmit="return myCheck()"  ><table width="100%" border="1"></tr><tr align="center" ><th colspan="2"><strong>资料添加</strong></th></tr><tr><td>QQ号码</td><td><input type="text" name="qqnum"  value="<?php echo ($data["qqnum"]); ?>" /></td></tr><tr><td>QQ昵称</td><td><input type="text" name="qqname"  value="<?php echo ($data["qqname"]); ?>" /></td></tr><tr><td>真实姓名</td><td><input type="text" name="realname"  value="<?php echo ($data["realname"]); ?>" /></td></tr><tr align="center" ><td colspan="2"><input type="submit" value="确认修改"/></td></tr></table></form></div></div><div style="font: 0px/0px sans-serif;clear: both;display: block"></div><div class="foot" align="center"><p>Copyright @ ToryZen Designs</p><p>Powered by ToryZen</p></div></div></body></html>