# 云签到
使用 PHP 编写的简易云签到工具，只适合个人使用，不需要数据库  
支持多账号  
**此分支新增前端界面**  

## 特性
* 支持 Qmsg/Server酱 推送  
* 已支持站点  
    * 百度贴吧
    * 哔哩哔哩 硬币签到
    * 哔哩哔哩直播
    * 哔哩哔哩漫画
    * 网易云音乐 积分签到

## 安装
把项目上传到任意一个支持 curl 的 PHP 空间/VPS 上  
按照注释修改`conf.php`的内容，在`cookies.php`里填好 cookie  
然后定时访问`start.php`即可  
**要求 PHP 版本 >= 7.1**

## 自定义网站
本项目支持自定义签到脚本  
新建一个 php 脚本放在 `/script` 目录下  
```php
<?php
//@id 脚本ID
//@name 脚本名称
//@icon 脚本图标，显示在 WebUI 上
//@site 目标网站域名，这个目前没用

//类名必须和 ID 一样，大小写必须相同！
//文件名必须和 ID 一样，而且文件名必须全小写！
class NAME extends Runner{
    public function run(string $aid, array $data)
    {
        //若使用 cookies.php：
        //TODO...
        //若使用 accounts.json（通过 UI 设置）：
        //$aid 为账号 ID（account id），$data 为对应账号的信息，参考 account.json
        
        //$nBuilder 为通知推送类，用法参考 /lib/notification.php
        
        $cookie = $data["cookie"];
        //签到...
    }
}
```


## 参考项目
* [BiliExp](https://github.com/MaxSecurity/BiliExper)
* [netease-cloud-api](https://github.com/ZainCheung/netease-cloud-api)