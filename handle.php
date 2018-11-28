 <?php
 
 /**
 *  author:群众
 *  time:2018/11/20
 *  function:处理文件
 */
 
 #获取游戏类型名称
function get_game_types($dir)
{
	$game_types = array();
	if($dir_handle = @opendir($dir))
	{
	  while($filename = readdir($dir_handle))
	  {
		if($filename != "." && $filename != "..")
		{
		$subFile = $dir.DIRECTORY_SEPARATOR.$filename; 
		if(is_dir($subFile))                         
		{
		  array_push($game_types,$filename);
	    }
	   }
     }
	 closedir($dir_handle);
  }
  return $game_types;

}
#获取游戏类型名称里面图片
function get_img($dir)
{
	$imgs = array();
	if($dir_handle = @opendir($dir))
	{
	  while($filename = readdir($dir_handle))
	  {
		if($filename != "." && $filename != "..")
		{
		$subFile = $dir.DIRECTORY_SEPARATOR.$filename; 
		if(is_file($subFile))                          
		{
		  array_push($imgs,$filename);
	    }
	   }
     }
	 closedir($dir_handle);
  }
  return $imgs;

}

#显示推荐热门游戏
function show_game($dir)
{
	$game_types=get_game_types($dir);
	#遍历类型名称
	foreach($game_types as $game_type)
	{
		
	    #遍历类型子文件
		$path = $dir.'/'.$game_type.'/';
		$imgs=get_img($path);
		
		$i=1;
		echo "<div id=".'"'.$game_type.'">';
		echo $game_type."<br><tr>";
		echo "<script>var gameType=\"$game_type\";</script>";
		foreach($imgs as $val)
		{   
			$temp=$path.$val;
			echo '<td><img src="'.$temp.'"' . " width=184px height=69px >" . '<a  href="download.html" class="DownButtonNormal" name="DownLoadHistEvent" style="color:#ffffff">下载</a></td>';
			if($i==4)
			{	
			    echo "<script>var gameType=null;</script>";
				echo "</tr>";
                break;				
			}
			$i++;
		}
		echo '</div>';
		
	}
	#echo '<script type="text/javascript" language="javascript" src="index.js" charset="utf-8"></script>';
	#echo '<hr><br><td align="center"><input type="button" id="show_hide" align="center" value="查看更多" onclick=showGames();></td><br><br><br>';
    echo "<hr>";
	return true;
	
}
?>
