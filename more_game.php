<?php
   
   include "handle.php";
   function more_game($dir)
   {
    $game_types=get_game_types($dir);
	#遍历类型名称
	foreach($game_types as $game_type)
	{
		
	    #遍历类型子文件
		$path = $dir.'/'.$game_type.'/';
		$imgs=get_img($path);
	  
		echo "<br><tr>";
		echo "<script>var gameType=\"$game_type\";</script>";
		#去掉前面展示,切片
		$imgs=array_slice($imgs,4,4);
		echo "<tr>";
		$i =1;
		foreach($imgs as $val)
		{   
		  
		  
		  $temp=$path.$val;
		  echo '<td><img src="'.$temp.'"' . " width=184px height=69px >" . '<a class="DownButtonNormal" name="DownLoadHistEvent" style="color:#ffffff">下载</a></td>';
		  #echo $val."<br>";
	   }
		echo "</tr>";
		
	}
	echo '<script type="text/javascript" language="javascript" src="index.js" charset="utf-8"></script>';
	echo '<hr><br><td align="center"><input type="button" align="center" value="收起" style="color:green;" onclick=hideGames();></td><br><br><br>';
   }
  
  if($_GET['req']=="more")
  {
    more_game("gameData/imgs");
  }
   if($_GET["req"]=="hide")
   {
	  echo '';   
   }
?>