/*	  
	author:群众
	time:2018/11/20
	function:触发使用ajax给服务器发送request,局部刷新加载更多.
*/
     window.onload = function(){  
        var images = document.getElementById("news").getElementsByTagName('img');
        var pos = 0;
        var len = images.length;
         
        setInterval(function(){
         
            images[pos].style.display = 'none';
            pos = ++pos == len ? 0 : pos;
            images[pos].style.display = 'inline';
         
        },3000);
         
    };
    function create_xml_object()
	{
	  var xmlHttp;
	  if(window.XMLHttpRequest)
	  {
		  xmlHttp=new XMLHttpRequest();
	  }
	  else
	  {
		  xmlHttp=new ActiveXobject("Microsoft.XMLHTTP");
	  }
	  return xmlHttp;
	}
	
	function showGames()	
	{	  
	
	  document.getElementById("show_hide").style.display="none";
	  xmlHttp=create_xml_object();
	  var val ="more";
	  url="more_game.php?req="+val;
	  xmlHttp.onreadystatechange=function()
	  {
		 if(xmlHttp.readyState==4&&xmlHttp.status==200)
		{
			document.getElementById("more_games").innerHTML=xmlHttp.responseText;
		}
	  }
	  xmlHttp.open("GET",url,true);
	  xmlHttp.send();
	
	}	
    
	function hideGames()
	{
	
	  var obj=document.getElementById("show_hide").style.display="inline";
      
	  var xmlHttp=create_xml_object();
	  var val="hide";
	  url="more_game.php?req="+val;
	  xmlHttp.onreadystatechange=function()
	  {
		 if(xmlHttp.readyState==4&&xmlHttp.status==200)
		{
			document.getElementById("more_games").innerHTML=xmlHttp.responseText;
		}
	  }
	  xmlHttp.open("GET",url,true);
	  xmlHttp.send();	
	}
	
	function test()
	{
		alert("调用index.js文件test函数");
		
	}
  	   