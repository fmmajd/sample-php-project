FROM php:7.3-fpm

RUN apt-get update \
    && apt-get install -y \
    git  \
    zip \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer \
    && composer global require "squizlabs/php_codesniffer=*"

RUN echo 'export PATH="/root/.composer/vendor/bin:$PATH"' >> ~/.bashrc \
    && ln -s /root/.composer/vendor/bin/phpcs /usr/local/bin/phpcs \
    && ln -s /root/.composer/vendor/bin/phpcbf /usr/local/bin/phpcbf

WORKDIR /var/www/html
