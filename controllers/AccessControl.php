<?php
function hasAccessToPage($page) {

    if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
        return false;  
    }
    switch ($page) {
        case 'cricket':
            return isset($_SESSION['cricket']) && $_SESSION['cricket'] === true;
        case 'football':
            
            return isset($_SESSION['football']) && $_SESSION['football'] === true;
        default:
            return false;
    }
}
?>
