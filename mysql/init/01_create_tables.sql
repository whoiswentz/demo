-- Sample initialization script for demo database
-- This file will be automatically executed when the MySQL container starts for the first time

USE demo_db;

-- Posts table with only id and title
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);

-- Example data insertion for posts
INSERT INTO posts (title) VALUES 
('First Post'),
('Second Post'),
('Third Post');

-- Grant privileges (optional, as demo_user already has access to demo_db)
GRANT ALL PRIVILEGES ON demo_db.* TO 'demo_user'@'%';
FLUSH PRIVILEGES;
