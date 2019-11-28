From centos:7

RUN  yum update -y && yum install -y epel-release which git
RUN rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm && \
    yum install -y --enablerepo=remi-php71 php php71-php-mbstring php71-php-pdo php-pdo php71-php-mysqlnd php-mysqlnd php-mbstring

RUN echo 'extension=pdo_mysql.so' >> /etc/php.d/20-pdo.ini


RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    mv composer.phar /bin/composer && \
    php -r "unlink('composer-setup.php');"

# fuel
RUN curl https://get.fuelphp.com/oil | sh

# mail
RUN curl -sSLO https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 \
    && chmod +x mhsendmail_linux_amd64 \
    && mv mhsendmail_linux_amd64 /usr/local/bin/mhsendmail \
    && echo 'sendmail_path = "/usr/local/bin/mhsendmail --smtp-addr=mailhog:1025"' >> /etc/php.ini

# COPY myapp.sh /usr/local/bin/
# RUN chmod 755 /usr/local/bin/myapp.sh
# COPY ./httpd.conf /etc/httpd/conf/httpd.conf
EXPOSE 80
# CMD ["/usr/sbin/init"]
CMD ["httpd", "-DFOREGROUND"]
