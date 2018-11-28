

特别注意:要有Apache+php运行环境才可以,不能直接单击index.html,这样子是不行的。
         配置好环境,输入,游览器输入localhost就ok.
        
1.开发环境
    编辑器:Notepad
	
2.用到语言
      html,css,js,php。ajax技术用于局部刷新
3.运行环境
    apache+php(游览器要能运行js脚本,不能禁止)
	
4.文件目录介绍

              1.index.html     首页文件               
     群众--<<<2.style.css      css样式文件,用于设置index.html页面
	          3.index.js       js文件,触发事件处理,发起ajax请求
			  4.handle.php     处理文件
			  5.more_game.php  ajax使用后显示更多游戏内容
			  6.show_game.php  index.html文件打开就加载的游戏内容
		        
               目录：
               gameData目录     简单获取一些图片,用于网页布局使用
               文件
               imgs	            存放获取图片,文件及是游戏名称
               get_gameinfo.py  简单的爬取代码文件			   
          					  