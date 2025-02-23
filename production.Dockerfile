FROM jhonoryza/frankenphp-pgsql:8.2 AS build

WORKDIR /app

COPY . ./

# Install dependencies menggunakan Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-plugins --no-scripts --prefer-dist

# Install Bun
RUN apt-get update && apt-get install -y curl
RUN curl -fsSL https://bun.sh/install | bash
ENV PATH="/root/.bun/bin:${PATH}"

# Install Node.js dependencies using Bun
RUN bun install

# Build the application
RUN bun build

# Final stage
FROM jhonoryza/frankenphp-pgsql:8.2

WORKDIR /app

COPY . ./
COPY --from=build /app/public /app/public
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
