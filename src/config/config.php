<?php

/**
 * Shithost Configuration File
 * 
 * This file contains the main settings for the Shithost file-sharing service.
 */

// Site Information
$site_name        = "Shithost"; // The name of the site.
$description      = "a simple temporary file sharing service."; // Short description of the site.
$site_domain      = "shithost.wtf"; // The site's domain.
$admin_email      = "admin@shithost.wtf"; // Contact email.

// Social & Repository Links

// GitHub
$github_user      = "nitondev";
$github_repo      = "shithost";
$enable_github    = true;

// GitLab
$gitlab_user      = "";
$gitlab_repo      = "";
$enable_gitlab    = false;

// GitBucket / Gitea
$gitbucket_user   = "";
$gitbucket_repo   = "";
$enable_gitbucket = false;

// Social Media
$twitter_handle   = "nitondev"; 
$enable_twitter   = false;

$discord_invite   = ""; 
$enable_discord   = false;

$telegram_group   = ""; 
$enable_telegram  = false;

// Upload Settings
$max_upload_size  = 50;  // Maximum file upload size in MB.
$max_upload_hours = 24;  // Maximum time files are stored.

?>