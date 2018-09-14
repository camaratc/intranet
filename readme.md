# Instalação: #

1. Iniciar o container com ```docker-compose up -d``` e executar o seguinte comando em seguida:
	> ```docker-compose exec apache bash -c "apt update && apt -y upgrade && apt install -y libapache2-mod-php php-mysql php-pear php-fpm php-dev php-zip php-curl php-xmlrpc php-gd php-mbstring php-xml" ```

2. Comando: ```docker-compose exec db bash```, instalar vim ou nano (Ex.: ```apt update && apt install vim -y```) e adicionar o _default authentication plugin_ em **/etc/mysql/my.cnf**
    > [mysqld] <br />
    default_authentication_plugin = mysql_native_password

3. Sair do bash do container bd e usar comando: ```docker-compose restart```;

4. Abrir o site pelo _{host}:5000_ e instalar o Wordpress;

5. No painel do Wordpress, ir em Ferramentas, Importar (Importar do Wordpress) e importar o arquivo .xml mais recente da pasta **/scripts/bkp**

6. Aparência -> Temas -> Ativar **Patus**;

7. Excluir Página Exemplo;

8. Configurações -> Links Permanentes -> Nome do Post

9. Ativar o plugin **PageRestrict**, modificar a mensagem padrão e ativá-lo na página "Gerenciar";

10. Ativar o plugin **Advanced Excerpt**;

11. Desabilitar os comentários nas configurações; 

12. Aparência -> Menus: Modificar o link personalizado para a página inicial substituindo "_localhost_" pelo Host real;

13. Modificar a cor para a cor padrão do tema, o subtítulo do site e posicionar os itens do menu pela opção personalizar.

## Obs.: ##

- Verde padrão do tema: ```#7fc732```;
- Páginas alteradas listadas no arquivo _custom-pages.txt_;
- Para realizar o proxy reverso copiar o arquivo _config/intranet.conf_ para a pasta de configuração do Nginx _/etc/nginx/conf.d/_
