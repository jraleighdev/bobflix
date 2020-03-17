<?php
    require_once("includes/header.php");

    $preview = new PreviewProvider($con, $userLoggedIn);
    echo $preview->createPreview(null);

    $categories = new CategoryContainers($con, $userLoggedIn);
    echo $categories->ShowAllCategories();
?>