# laravelrest

```javascript
#Model Creation for the rest api

php artisan make:model Model/Product -a

php artisan make:model Model/Review -a

php artisan migrate


```


```javascript
#Runnig the db seed

php artisan db:seed

```

```javascript
	#create api resource
	php artisan make:resource Product/ProductCollection
	php artisan make:resource Product/ProductResource
	php artisan make:resource ReviewResource

```

```javascript
	#configure api authentication using passport
	

	composer require laravel/passport
	php artisan migrate
	php artisan passport:install


	//open user model and use HasApiTokens in the model body

	use Laravel\Passport\HasApiTokens;

	//now open AuthServiceProvider and go to boot method and put the following functions

	 Passport::routes(); //make sure to use --> use Laravel\Passport\Passport;

	 #now go to config/auth.php

	 and change api-> driver ='passport' from token


	php artisan config:cache
	#if you don't get client token then make sure set password_client=1 from oauth_clients table
	#Or you can run the following command to make client and set password_client to 1 
	php artisan passport:client --password
	 #now open http://localhost:8000/oauth/token in postman
	 #set the header like following

	 [key]<-------->[value]
	 Accept 		---> application/json
	 Content-Type	---> application/json

	 #set the body like following
	{
		"grant_type":"password",
		"client_id":"2",
		"client_secret":"BE2vh7aPDgdRLsiHjI7J7XZfTwlSdAEX872xxkPM",
		"username":"samin@test.com",
		"password":"123456"
	}

	#now you will get access token like following
	"access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjZiYjhlMjZhMjNlZjMyNjVlNmE0ZjhlNzMyYzgxZGU2NDQ1MDhmZDUxZWE2YTA0NTIwNGFjYmZmYzU1YmRlN2RjZDc3NWYxNDI2ZThiMzEyIn0.eyJhdWQiOiIyIiwianRpIjoiNmJiOGUyNmEyM2VmMzI2NWU2YTRmOGU3MzJjODFkZTY0NDUwOGZkNTFlYTZhMDQ1MjA0YWNiZmZjNTViZGU3ZGNkNzc1ZjE0MjZlOGIzMTIiLCJpYXQiOjE1MTM0NTE1MzMsIm5iZiI6MTUxMzQ1MTUzMywiZXhwIjoxNTQ0OTg3NTMyLCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.C14iNj7X2hPIn4Vk-3Ej4hthYw1O1D_yIn3a-k7wVO2vWH7pgXCK-LFkufMFn5wEkMVGt1auAfzLeYIBIO9gwm5xfaHht2M4_k2H_UDyQ9WXZ4_zKRMfxpBU6uxgoLwQE_wXKuFxANOcGZz90HIoQs8CBmL7EhV6wH_lrlHCt3oLXH5O6OYLLYW7sX7IdrQ5lNY1zHi8IzEsrSCmeAsS4DUTL843I0bJxAxD_8pF6T50RPJEAFmgl_FfkjD4yqYp1sADuGnf06afLAGBwTw7vEQRvK_x6RP65y3ynsAxOwl6e1c0oN0QTEVGcAxFUTSDJi6luMDPEs-cymspV4fqPhaUf_xSXuZZqr8REdFp7sntPY_3dfiPMJpEuJ_skWZ53UTUlRtd5O1ro5IK0hSwr4hWgPjcS_IayqbuanzFMTwp1wj0zxOSCeY96VDzBhWT1S_imyJQB7T9jRCEgxfpj6xPOKiEGcPnuL0yzeGQyaigVMuWip0x31GITT9Bj_BATcZAS-O_sS-GObzRzvb6ld_xGyTfRSZQPnH7qRxbXkxRhsKEezNSPwFH67Lv3qd4K39znfrAw9jiyQTRmRiEvjGTfrUyTa8BLeCCRow5L5uU0UL9etgInermuimx2gT70_BZBST9yv3eF0WftmX66MzQtYO1hQYsUAYwKjRERSE",


```

