FROM php:fpm

# Cài đặt các thư viện cần thiết và các tiện ích để xây dựng phần mở rộng PHP
RUN apt-get update \
  && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
  && docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install pgsql pdo pdo_pgsql 

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /app

# Sao chép tệp composer.json vào thư mục làm việc
COPY composer.json /app

# Run Composer để cài đặt các phụ thuộc PHP
RUN composer install

# Sao chép mã nguồn ứng dụng vào Docker container
COPY ./app /app

# Chạy Composer dump-autoload để tạo autoload files
RUN composer dump-autoload --optimize


#VERSION2
# FROM php:fpm

# # Cài đặt Nginx và các gói phụ thuộc
# RUN apt-get update \
#     && apt-get install -y nginx \
#     && rm -rf /var/lib/apt/lists/*

# # Cấu hình Nginx
# COPY nginx.conf /etc/nginx/nginx.conf

# # Cấu hình Nginx để sử dụng PHP-FPM
# RUN sed -i 's|;*daemonize\s*=\s*yes|daemonize = no|g' /usr/local/etc/php-fpm.conf \
#     && sed -i 's|listen\s*=\s*127.0.0.1:9000|listen = /var/run/php-fpm.sock|g' /usr/local/etc/php-fpm.d/www.conf \
#     && sed -i 's|;*listen.owner\s*=\s*www-data|listen.owner = www-data|g' /usr/local/etc/php-fpm.d/www.conf \
#     && sed -i 's|;*listen.group\s*=\s*www-data|listen.group = www-data|g' /usr/local/etc/php-fpm.d/www.conf \
#     && sed -i 's|;*listen.mode\s*=\s*0660|listen.mode = 0660|g' /usr/local/etc/php-fpm.d/www.conf

# # Khởi động PHP-FPM
# CMD php-fpm