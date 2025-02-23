FROM jhonoryza/frankenphp-pgsql:8.2 AS build

WORKDIR /app

COPY . ./

# Install dependencies menggunakan Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-plugins --no-scripts --prefer-dist

# Install bun
RUN curl -fsSL https://bun.sh/install | bash
RUN source ~/.bashrc

RUN bun i
RUN bun build

# Final stage
FROM jhonoryza/frankenphp-pgsql:8.2

WORKDIR /app

COPY . ./
COPY --from=build /app/public /app/public
COPY --from=build /app/bootstrap/ssr /app/bootstrap/ssr
COPY --from=build /usr/local/bin/node /usr/local/bin/node
COPY --from=build /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=build /app/node_modules /app/node_modules

# Install dependencies menggunakan Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-plugins --no-scripts --prefer-dist

RUN rm -rf /root/.composer
RUN rm -rf ./git

# Install supervisord
RUN apt-get update && apt-get install -y supervisor

# Copy supervisord configuration
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Jalankan supervisord dengan konfigurasi yang ditentukan
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
