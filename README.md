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

## 操作流程 & 簡述
- [PermissionRolePractice](#permissionrolepractice)
- [DEMO](#demo)
- [操作流程 \& 簡述](#操作流程--簡述)
    - [建立 GCP VM 執行個體](#建立-gcp-vm-執行個體)
    - [使用 SSH 建立使用者並設定安全殼層金鑰](#使用-ssh-建立使用者並設定安全殼層金鑰)
    - [部屬環境及安裝所需套件](#部屬環境及安裝所需套件)
    - [套上 Domain 並使用 Nginx 設定 HTTPS 建立自行簽屬 SSL 憑證](#套上-domain-並使用-nginx-設定-https-建立自行簽屬-ssl-憑證)
- [License](#license)

在寫了1年多的 `VB.Net` 後，突然對其他框架感到好奇。
就心血來潮的選了 `PHP & Laravel` 來嘗試看看這之間的差異性，剛好工作上正在重構有關 `用戶權限` 的系統，正好就拿這部份來嘗鮮了。
<span style="font-size: 8px;">先打個預防針，本人非本科系是個自學半路出家的小白，如果讓你有快中風的操作還請見諒 XD。</span>

<a id="create_vm"></a>
#### 建立 GCP VM 執行個體
首先當然需要先註冊一個 [GCP](https://cloud.google.com/) 帳號，流程就不多說明了。
進入主控台後建立一個新的專案

<a id="set_ssh"></a>
#### 使用 SSH 建立使用者並設定安全殼層金鑰

<a id="deployment_environment"></a>
#### 部屬環境及安裝所需套件

<a id="set_domain_and_ssl"></a>
#### 套上 Domain 並使用 Nginx 設定 HTTPS 建立自行簽屬 SSL 憑證

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
