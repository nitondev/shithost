<?php

function printSocialLinks() {
    global $enable_github, $github_user, $github_repo, $enable_gitlab, $gitlab_user, $gitlab_repo, 
           $enable_gitbucket, $gitbucket_user, $gitbucket_repo, $enable_twitter, $twitter_handle, 
           $enable_discord, $discord_invite, $enable_telegram, $telegram_group;

    $social_links = [];

    if ($enable_github) {
        $social_links[] = '<a href="https://github.com/' . htmlspecialchars($github_user) . '/' . htmlspecialchars($github_repo) . '" target="_blank" class="primary-link mx-1">GitHub</a>';
    }
    if ($enable_gitlab) {
        $social_links[] = '<a href="https://gitlab.com/' . htmlspecialchars($gitlab_user) . '/' . htmlspecialchars($gitlab_repo) . '" target="_blank" class="primary-link mx-1">GitLab</a>';
    }
    if ($enable_gitbucket) {
        $social_links[] = '<a href="https://gitea.com/' . htmlspecialchars($gitbucket_user) . '/' . htmlspecialchars($gitbucket_repo) . '" target="_blank" class="primary-link mx-1">GitBucket</a>';
    }
    if ($enable_twitter) {
        $social_links[] = '<a href="https://twitter.com/' . htmlspecialchars($twitter_handle) . '" target="_blank" class="primary-link mx-1">X (Twitter)</a>';
    }
    if ($enable_discord) {
        $social_links[] = '<a href="' . htmlspecialchars($discord_invite) . '" target="_blank" class="primary-link mx-1">Discord</a>';
    }
    if ($enable_telegram) {
        $social_links[] = '<a href="' . htmlspecialchars($telegram_group) . '" target="_blank" class="primary-link mx-1">Telegram</a>';
    }

    if (!empty($social_links)) {
        echo '<span class="pipe">|</span>';
        foreach ($social_links as $link) {
            echo $link;
            echo '<span class="pipe">|</span>';
        }
    }
}

?>

<div class="text-center pt-2">
    <a href="#" id="theme-toggle" class="primary-link mx-1"><i class="bi bi-moon-fill"></i></a> 
    <span class="pipe">|</span> 
    
    <a href="/" class="primary-link mx-1"><?= $site_name; ?></a>
    <span class="pipe">|</span> 

    <a href="/browse.php" class="primary-link mx-1">Browse</a>

    <?php printSocialLinks(); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
<script src="assets/js/toggle.js"></script> 
<script src="assets/js/shithost.js"></script> 

</body></html>
