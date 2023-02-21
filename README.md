## Install
1 - `composer install`

2 - `php artisan serve`

## Test
1 - `php artisan test`


##Example Request

```
curl --location --request POST 'http://127.0.0.1:8000/api/shortlinks' \
--header 'Authorization: Bearer 5XR2Dp0wGpWqr12uu7eNZRx039krua2uVYqU1Ud9cYNNJrSatMnuuhjLBvVd8ud6itRCwn3CElkh83tgHgOfzz7a02ucDk9XysVgl7sefiQT5f3fut76VDYnxRmK4WGE' \
--header 'Content-Type: application/json' \
--data-raw '{
"provider": "bit.ly",
"url": "https://example.com/"
}  '
```


```
curl --location --request POST 'http://127.0.0.1:8000/api/shortlinks' \
--header 'Authorization: Bearer 5XR2Dp0wGpWqr12uu7eNZRx039krua2uVYqU1Ud9cYNNJrSatMnuuhjLBvVd8ud6itRCwn3CElkh83tgHgOfzz7a02ucDk9XysVgl7sefiQT5f3fut76VDYnxRmK4WGE' \
--header 'Content-Type: application/json' \
--data-raw '{
"provider": "tinyurl",
"url": "https://example.com/"
}  '
```


```
curl --location --request POST 'http://127.0.0.1:8000/api/shortlinks' \
--header 'Authorization: Bearer 5XR2Dp0wGpWqr12uu7eNZRx039krua2uVYqU1Ud9cYNNJrSatMnuuhjLBvVd8ud6itRCwn3CElkh83tgHgOfzz7a02ucDk9XysVgl7sefiQT5f3fut76VDYnxRmK4WGE' \
--header 'Content-Type: application/json' \
--data-raw '{
"url": "https://example.com/"
}  '
```

##Notes

TinyUrl provider is working but bitly provider is not working because I need token.
I was handled a provider fail case. If requested bitly, short link created from tinyUrl.
If you want try bitly, you can define token in .env file




