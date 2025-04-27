@echo off
echo Sembolik bağlantı oluşturuluyor...
cd /d %~dp0
mklink /D "public\storage" "storage\app\public"
echo Sembolik bağlantı başarıyla oluşturuldu!
pause 