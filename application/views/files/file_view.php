<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
     <meta charset=utf-8>
   <title>Files</title>
 </head>
 <body>
     <?php 
        foreach($file  as $r): 
            echo "<a href = '".base_url()."files"."/".$r->semester."/".$r->subject."/".$r->id."'>$r->oldFileName</a>";
            echo "<br>";
        endforeach;  
        echo "<a href = '".base_url()."files"."/".$r->semester."/".$r->subject."/"."upload"."'>Завантажити файл</a>";
     ?>
     
 </body>
</html>