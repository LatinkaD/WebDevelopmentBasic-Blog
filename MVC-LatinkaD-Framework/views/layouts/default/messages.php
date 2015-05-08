<?php
if (isset($_SESSION['messages'])) {
    echo '<span>';
    foreach ($_SESSION['messages'] as $msg) {
        echo '<p class="' . $msg['type'] . '">';
        echo htmlspecialchars($msg['text']);
        echo '</p>';
    }
    echo '</span>';
    unset($_SESSION['messages']);
}