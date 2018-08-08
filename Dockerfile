FROM ubuntu

RUN apt update && apt -y upgrade
RUN DEBIAN_FRONTEND=noninteractive apt install -y php-pear php-fpm php-dev php-zip php-curl php-xmlrpc php-gd php-mysql php-mbstring php-xml libapache2-mod-php php5 php5-mcrypt
RUN php -r 'echo "\n\nYour PHP installation is working fine.\n\n\n";'

EXPOSE 5000