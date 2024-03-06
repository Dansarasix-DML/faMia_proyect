Añade el siguiente Virtual Host para probarlo:

```
<VirtualHost famia.com:80>
    DocumentRoot "C:/xampp/htdocs/DWES/Ud5/act_eval/proyecto/public/"
    ServerName famia.com
    <Directory C:/xampp/htdocs/DWES/Ud5/act_eval/proyecto/>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Y añade esta línea a tu host: ``127.0.0.1 famia.com``

**Para ver la parte de las comandas**

Mirar el archivo users.php
