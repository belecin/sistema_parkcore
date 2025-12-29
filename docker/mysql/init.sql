-- MySQL initialization script
-- This runs when the container is first created

-- Set timezone
SET GLOBAL time_zone = '-05:00';

-- Grant all privileges to the app user
GRANT ALL PRIVILEGES ON parkcore_db.* TO 'parkcore'@'%';
FLUSH PRIVILEGES;
