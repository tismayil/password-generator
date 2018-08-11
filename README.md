# Password Generator

##### For BruteForce or Md5 Crack/Comparison

```sh
$ php password-generator --info="victim name,victim surname , victim age , victim email"
```

- --info Get all information from victim.
- --path The area where the file will be saved (optional).
- --md5 The passwords created with this value will also be created in your md5 (optional).
 

![N|Solid](https://raw.githubusercontent.com/tismayil/password-generator/master/images/3.png)

```sh
$ php password-generator --info="victim name,victim surname , victim age , victim email" --md5
```

- --search In this term you can search within the passwords that you have created (optional).
 
```sh
$ php password-generator --info="victim name,victim surname , victim age , victim email" --md5 --search="a6d24b91154f8b9e25403416930e98be"
```
![N|Solid](https://raw.githubusercontent.com/tismayil/password-generator/master/images/4.png)
