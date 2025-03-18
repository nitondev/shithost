<?php
function timeAgo($timestamp) {
    $timeDiff = time() - strtotime($timestamp);

    if ($timeDiff < 60) {
        return $timeDiff . "s"; // Sekunder
    } elseif ($timeDiff < 3600) {
        return floor($timeDiff / 60) . "m"; // Minuter
    } elseif ($timeDiff < 86400) {
        return floor($timeDiff / 3600) . "h"; // Timmar
    } elseif ($timeDiff < 2592000) {
        return floor($timeDiff / 86400) . "d"; // Dagar
    } elseif ($timeDiff < 31536000) {
        return floor($timeDiff / 2592000) . "M"; // Månader
    } else {
        return floor($timeDiff / 31536000) . "Y"; // År
    }
}

?>
