# digital-literacy-ai-example

<VirtualHost *:80>
    ServerName digitalshowcase.sjsu
    DocumentRoot "C:/xampp/htdocs/digital-literacy-ai-example/main"
    <Directory "C:/xampp/htdocs/digital-literacy-ai-example/main">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>