<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## PermissionRolePractice
> 練習以 laravel 建置權限系統並部屬至GCP(Google Cloud Platform)  

## DEMO
不囉嗦，先上結果 [PermissionRolePractice](https://skyery.ddns.net)  

## 簡述 & 操作流程
在寫了1年多的 `VB.Net` 後，突然對其他框架感到好奇。  
就心血來潮的選了 `PHP & Laravel` 來嘗試看看這之間的差異性，剛好工作上正在重構有關 `用戶權限` 的系統，正好就拿這部份來嘗鮮了。  
<small>先打個預防針，本人非本科系是個自學半路出家的小白，如果讓你有快中風的操作還請見諒 XD。</small>  

* [建立 GCP VM 執行個體](#create_vm)
* [使用 SSH 建立使用者並設定安全殼層金鑰](set_ssh)
* [部屬環境及安裝所需套件](deployment_environment)
* [套上 Domain 並使用 Nginx 設定 HTTPS 建立自行簽屬 SSL 憑證](set_domain_and_ssl)  

<a id="create_vm"></a>
#### 建立 GCP VM 執行個體
首先當然需要先註冊一個 [GCP](https://cloud.google.com/) 帳號，流程就不多說明了。  
進入主控台後建立一個新的專案，找到 `Compute Engine` → `VM 執行個體`，建立執行個體。  

![VM 執行個體](https://github.com/Skyery/PermissionRolePractice/blob/master/readme/GCP_VM%E5%9F%B7%E8%A1%8C%E5%80%8B%E9%AB%94_1.png?raw=true)  

設定主機名稱、在 `管理標記和標籤` 設定主機位置以及主機的規格。(我是選預設值，畢竟是練習..)  

![主機規格與區域](https://github.com/Skyery/PermissionRolePractice/blob/master/readme/GCP_VM%E5%9F%B7%E8%A1%8C%E5%80%8B%E9%AB%94_3.png?raw=true)  

設定主機 `開機磁碟`，作業系統選擇 `Ubuntu` 開機磁碟類型選擇 `SSD 永久磁碟`  

![開機磁碟設定](https://github.com/Skyery/PermissionRolePractice/blob/master/readme/GCP_VM%E5%9F%B7%E8%A1%8C%E5%80%8B%E9%AB%94_4.png?raw=true)  

設定主機 `防火牆` 將 `允許 HTTP 流量` 以及 `允許 HTTPS 流量` 勾選，以上就完成設定可以點選 `建立` 啦。  

![防火牆設定](https://github.com/Skyery/PermissionRolePractice/blob/master/readme/GCP_VM%E5%9F%B7%E8%A1%8C%E5%80%8B%E9%AB%94_5.png?raw=true)  

<a id="set_ssh"></a>
#### 使用 SSH 建立使用者並設定安全殼層金鑰
使用 [PuTTY](https://www.putty.org/) 的 `PuTTYgen` 建立金鑰，點選 `Generate` 後再紅框處晃動滑鼠，透過滑鼠軌跡產生金鑰。  

![產生金鑰](https://github.com/Skyery/PermissionRolePractice/blob/master/readme/SSH_1.png?raw=true)  

金鑰產生後修改 `用戶名稱` 這會是之後 SSH 連線後的用戶名稱，再輸入 SSH 連線時的密碼。  
最後別忘記點選 `Save public key` 及 `Save private key` 儲存公鑰及私鑰。

![產生金鑰](https://github.com/Skyery/PermissionRolePractice/blob/master/readme/SSH_2.png?raw=true)  

再回到 GCP 控制台，點選你的 `主機名稱` → `編輯`，找到 `安全殼層金鑰` 點選 `新增項目` 將剛剛產生出來的那一長串key貼上，最後記得儲存，到這裡PuTTYgen就能關掉了。  

![設定安全殼層](https://github.com/Skyery/PermissionRolePractice/blob/master/readme/SSH_3.png?raw=true)  

打開 `PuTTY` 在 `Host Name (or IP address)` 輸入 `用戶名稱@GCP對外IP`，左設選單找到 `Connection` → `SSH` → `Auth` → `Credentials` 在紅框處選到剛剛儲存下來的私鑰，再回到 `Session` 在 `Saved Sessions` 命名這個SSH連線後按下 `Save` 這樣下次就不用重新設定了。



<a id="deployment_environment"></a>
#### 部屬環境及安裝所需套件

<a id="set_domain_and_ssl"></a>
#### 套上 Domain 並使用 Nginx 設定 HTTPS 建立自行簽屬 SSL 憑證

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
