# CRM
### Configuração
- Fazer download do xampp com PHP na versão 7.4 [Xampp](https://www.apachefriends.org/pt_br/download.html)
- Configurar o arquivo na pasta C:\xampp\apache\conf\extra\httpd-vhosts.conf 
  - Adicione o código abaixo
  ```
    <VirtualHost *:80>
    	DocumentRoot "C:/xampp/htdocs/crm"
        ServerName www.crm.local
    </VirtualHost>
   ```
- Configurar o arquivo na pasta C:\Windows\System32\drivers\etc\host
  - Adicione o código abaixo
  ```
  127.0.0.1 www.crm.local
  ```
- Abra o XAMPP e execute o APACHE e o MYSQL

### Estrutura de pastas
  - App
    - Controller - (views e controladores do site)
    - Model - (backend, conexao com o banco de dados, autorização)
  - config - (configuração de paginas de erros, conexao com banco de dados e variaveis constantes)
  - css 
  - js
  - lib - (bibliotecas usadas no projeto)
  - view - (template do sistema, template inicial e views)
  - db_crm - (banco de dados)
    
