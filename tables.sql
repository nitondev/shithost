CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    original_filename VARCHAR(255) NOT NULL,
    new_filename VARCHAR(255) NOT NULL,
    file_size INT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    file_hash CHAR(64) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    short_url CHAR(6) NOT NULL UNIQUE,
    uploader VARCHAR(255) NOT NULL DEFAULT 'anon'
);
