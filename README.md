# Sabapaymak PHP Sdk for rest Api

## راهنما
صبا پیامک یک سیستم ارسال پیامک است که از طریق پنل یا وب سرویس میتوانید از آن استفاده کنید.

ابتدا از طریق Composer دستور زیر را اجرا کنید

##### Composer
```
composer require sabapayamak/php
```

سپس دستور زیر

##### Composer
```
composer update
```

## نحوه استفاده در کد


```php
try{
	$service = new \Sabapayamak\Sabapayamak( "YOUR_API_URL" );
	$result = $service->SendMessage("YOUR_MESSAGE_TEXT",array("NUMBER1","NUMBER2"),"YOUR_TOKEN"));
    retun $result;
}
catch(Exception $e){
	echo $e->errorMessage();
}
   
```