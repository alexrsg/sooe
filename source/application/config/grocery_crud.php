<?php

//For view all the languages go to the folder assets/grocery_crud/languages/
//$config['grocery_crud_default_language'] = 'english';
$config['grocery_crud_default_language'] = 'pt-br.portuguese';

// There are only three choices: "uk-date" (dd/mm/yyyy), "us-date" (mm/dd/yyyy) or "sql-date" (yyyy-mm-dd) 
$config['grocery_crud_date_format'] = 'uk-date';

// The default per page when a user firstly see a list page
$config['grocery_crud_default_per_page'] = 25; //Can only take values 10,25,50,100

$config['grocery_crud_file_upload_allow_file_types'] = 'gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2';
$config['grocery_crud_file_upload_max_file_size'] = '20MB'; //ex. '10MB' (Mega Bytes), '1067KB' (Kilo Bytes), '5000B' (Bytes)
