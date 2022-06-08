
## Installation Guide

1. `composer install` 
2. edit `.env` file to match your local development 
   - [ ] \(required) set app.baseURL
   - [ ] \(required) set database configuration
   - [ ] \(optional) set email smtp connection (if want to use email function)
   - [ ] \(optional) set other custom local development environtment to match your need
3. `php spark migrate --all`
4. `php spark db:seed InitialDB`


## API

API LIST

   - [**POST api/news**](#post-apinews)
   - [**GET api/news/readBy/(:num)/(:num)**](#get-apinewsreadbynumnum)
   - [**GET api/news/deleteBy/(:num)/(:num)**](#get-apinewsdeletebynumnum)
   - [**GET api/products**](#get-apiproducts)
   - [**POST api/products/carts**](#get-apiproductscarts)
   - [**POST api/products/buy**](#get-apiproductsbuy)


### **POST api/news**
Retrieving news data based on user_id

required post data

```
[
	'user_id' => 1,
]
```

return example

```
{
    "status": 200,
	"total": 1,
	"data": [
	  	{
			"id": "2",
			"title": "News 2",
			"content": "This is latest news 2. You can see detail content here. It could be long or short content. You can see detail content here. It could be long or short content. You can see detail content here. It could be long or short content. You can see detail content here. It could be long or short content.You can see detail content here. It could be long or short content.",
			"created_at": "2021-11-09",
			"published_at": "2021-11-09",
			"publish": "1",
			"sort_order": null
		}
	],
	"image_path": "http://aqura.local/uploads/files/"
}

```
### **GET api/news/readBy/(:num)/(:num)**
Get detail news and mark as read based on news ID and user ID

return example

```
{
    "status": 200,
	"data": {
		"id": "1",
		"title": "News 1",
		"content": "This is new news. You can see detail content here. It could be long or short content. You can see detail content here. It could be long or short content. You can see detail content here. It could be long or short content. You can see detail content here. It could be long or short content.You can see detail content here. It could be long or short content.",
		"created_at": "2021-11-08",
		"published_at": "2021-11-08",
		"publish": "1",
		"sort_order": null,
		"file_path": "\aqura-web\htdocs\public\uploads/files/"
	},
	"image_path": "http://aqura.local/uploads/files/"
}

```
### **GET api/news/deleteBy/(:num)/(:num)**
mark news as deleted based on news ID and user ID,it will be remove from user news list

return example

```
{
    "status": 200,
	"data": {
		"id": "1",
		"title": "News 1",
		"content": "This is new news. You can see detail content here. It could be long or short content. You can see detail content here. It could be long or short content. You can see detail content here. It could be long or short content. You can see detail content here. It could be long or short content.You can see detail content here. It could be long or short content.",
		"created_at": "2021-11-08",
		"published_at": "2021-11-08",
		"publish": "1",
		"sort_order": null,
		"file_path": \aqura-web\htdocs\public\uploads/files/"
	},
	"image_path": "http://aqura.local/uploads/files/"
}

```

### **GET api/products**
Retrieving products data

return example

```
{
    "status": 200,
    "total": 2,
    "data": [
        {
            "id": "2",
            "name": "Product ABC",
            "descrition": "Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. \r\n\r\nIni adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. \r\n\r\nIni adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. ",
            "picture": "parenthanks.png",
            "price": "1000",
            "publish": "1",
            "sort_order": "1",
            "created_at": "2021-11-09"
        },
        {
            "id": "1",
            "name": "Product 123",
            "descrition": "Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. \r\n\r\nIni adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. \r\n\r\nIni adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. Ini adalah product unggulan yang bisa anda miliki. Silakan beli sekarang juga. ",
            "picture": "pin.png",
            "price": "1000",
            "publish": "1",
            "sort_order": "2",
            "created_at": "2021-11-09"
        }
    ],
    "image_path": "http://aqura.local/uploads/files/"
}

```

### **POST api/products/addToCart**
Add item to carts

required post data

```
[
	'user_id'    => 1,
	'product_id' => 1,
	'qty'        => 33,
]
```

return example

```
{
    "status": 200,
    "data": {
        "0": {
            "id": "1",
            "user_id": "1",
            "product_id": "1",
            "qty": "33"
        },
        "file_path": "\\htdocs\\public\\uploads/files/"
    },
    "image_path": "http://aqura.local/uploads/files/"
}

```

### **POST api/products/carts**
Show user carts

required post data

```
[
	'user_id'    => 1,
]
```

### **POST api/products/buy**
Buy items

required post data

```
[
	'user_id'    => 1,
]
```