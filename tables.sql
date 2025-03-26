CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(15) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    original_filename VARCHAR(255) NOT NULL,
    new_filename VARCHAR(255) NOT NULL,
    file_size INT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    file_hash CHAR(64) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    short_url CHAR(6) NOT NULL UNIQUE,
    uploader VARCHAR(15) NOT NULL DEFAULT 'anon',
    user_id INT,
    CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id)
);
