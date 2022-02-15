<?php

if (isset($_FILES['file']['name'])) {
    /* Getting file name */
    $filename = $_FILES['file']['name'];

    /* Location */
    $location = "upload/" . $filename;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    /* Valid extensions */
    $valid_extensions = array("txt", "xml", "html");

    $response = 0;
    //var_dump($_FILES);
    /* Check file extension */
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
        $response = file_get_contents($_FILES['file']['tmp_name']);
    }

    echo $response;
    exit;
}

echo 0;