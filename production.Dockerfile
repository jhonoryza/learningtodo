# Stage 1: Composer stage menggunakan image jhonoryza/frankenphp-pgsql:8.2
FROM jhonoryza/frankenphp-pgsql:8.2 AS composer

WORKDIR /app

# Copy composer.json dan composer.lock
COPY composer.json composer.lock ./

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-plugins --no-scripts --prefer-dist

# Stage 2: Bun stage menggunakan image Bun
FROM oven/bun:1 AS bun

WORKDIR /app

# Copy application files
COPY . .

# Copy Composer dependencies dari stage composer
COPY --from=composer /app/vendor /app/vendor

# Install Node.js dependencies menggunakan Bun
RUN bun install

# Build the application
RUN bun run build

# Stage 3: Final stage menggunakan image jhonoryza/frankenphp-pgsql:8.2
FROM jhonoryza/frankenphp-pgsql:8.2

WORKDIR /app

# Copy application files
COPY . .

# Copy built assets dari stage bun
COPY --from=bun /app/public /app/public

# Copy Composer dependencies dari stage composer
COPY --from=composer /app/vendor /app/vendor

# Clean up
RUN rm -rf .git

# Install supervisord
RUN apt-get update && apt-get install -y supervisor

# Copy supervisord configuration
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set the command to run supervisord
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
