# Password Generator
![N|Solid](https://raw.githubusercontent.com/tismayil/password-generator/master/images/1.png)

```sh
$ php password-generator --info="victim name,victim surname , victim age , victim email"
```

- --info Get all information from victim.
- --name Name of the file to be recorded
- --path The area where the file will be saved
- --md5 The passwords created with this value will also be created in your md5
 

![N|Solid](https://raw.githubusercontent.com/tismayil/password-generator/master/images/3.png)

```sh
$ php password-generator --info="victim name,victim surname , victim age , victim email" --md5
```

- --search In this term you can search within the passwords that you have created
 
```sh
$ php password-generator --info="victim name,victim surname , victim age , victim email" --md5 --search="a6d24b91154f8b9e25403416930e98be"
```
![N|Solid](https://raw.githubusercontent.com/tismayil/password-generator/master/images/4.png)
