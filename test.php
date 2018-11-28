<?php

function get_game_types($dir)
{
	$game_types = array();
	if($dir_handle = @opendir($dir))
	{
	  while($filename = readdir($dir_handle))
	  {
		if($filename != "." && $filename != "..")
		{
		$subFile = $dir.DIRECTORY_SEPARATOR.$filename; //要将源目录及子文件相连
		if(is_dir($subFile))                          //若子文件是个目录
		{
		  array_push($game_types,$filename);
	    }
	   }
     }
	 closedir($dir_handle);
  }
  return $game_types;

}
function get_img($dir)
{
	$imgs = array();
	if($dir_handle = @opendir($dir))
	{
	  while($filename = readdir($dir_handle))
	  {
		if($filename != "." && $filename != "..")
		{
		$subFile = $dir.DIRECTORY_SEPARATOR.$filename; //要将源目录及子文件相连
		if(is_file($subFile))                          //若子文件是个目录
		{
		  array_push($imgs,$filename);
	    }
	   }
     }
	 closedir($dir_handle);
  }
  return $imgs;

}
	$dirNames = get_game_types("gameData/imgs"); //测试某目录
	$imgs = get_img("gameData/imgs/动作");  
	#var_dump($dirNames);
	foreach($dirNames as $val)
	{
		echo $val."<br/>";
	}
	#var_dump($imgs);
	foreach($imgs as $val)
	{
		echo $val."<br/>";
	}
	
?>
