<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
     <meta charset=utf-8>
   <title>Semesters</title>
 </head>
<body>
<form method ="post" action = "<?=base_url();?>upload_file/<?=$params[0];?>/<?=$params[1];?>/<?=$params[1]?>" enctype="multipart/form-data">
<input type ="file" name = "userfile"/>
<input type = "submit" name = "upload" value = "Завантажити"/>
</form>
</body>
</html>