Url Shortener
============
*Rút gọn link* sử dụng framework laravel

# Cài đặt và sử dụng
1. Upload code
2. Chạy `composer install`
3. Chạy `php artisan migrate`
4. Chạy `php artisan user create --email="Your email" --name="your name"`

Ví dụ:

`php artisan user create --email=thanh@thanh.com --name="Nguyen Thanh"`

Bạn sẽ nhận được kết quả như sau

```
create
User created successfully! id:1
Name: Nguyen Thanh
Email: thanh@thanh.com
Password: UvrEdU8PBP4H7vo0
Api key: 45S0cnTWChFYDM5NaKRU9dcOzmvUeHMsDzTXbC98
```

Bạn lưu lại api key để sử dụng.

Để rút gọn link bạn sử dụng api:

`domain.com/api/v1/short?apiKey={apikey}&longUrl=https://your_long_url_here`

Với tham số apiKey chính là api key nhận được ở bên trên. Kết quả trả về sẽ ở dạng json
```
{ id: http://shorted_url}
```






