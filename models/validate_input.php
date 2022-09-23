<?php

 // validate title 
    // INPUT TITLE: Required + must have 2 or more chars
    if(empty($_POST['title'])) {
        $systemErrors['title_err'] = '* title is required';
        echo 'title is required' . '<br>';
    } else {
        $title = test_input($_POST['title']);
        if(strlen($title) < 2) {
            $systemErrors['title_err'] = '* title must have at least to chars';
            echo 'title must have 2 chars' . '<br>';
        } else {
            echo 'title is VALID' . '<br>';
        }
    }

    // validate description
    // TEXTAREA DESC: Required + min 10 chars + max 100 chars
    if(empty($_POST['description'])) {
        $systemErrors['description_err'] = '* Description is required';
        echo 'description is required';
    } else {
        $description = test_input($_POST['description']);
        if(strlen($description) < 10) {
            $systemErrors['description_err'] = '* Description must have at least 10 chars';
            echo 'description must have min 10 chars';
        } else if(strlen($description) > 100) {
            $systemErrors['description_err'] = '* Description is too long. Max 100 chars';
            echo 'Description is too long. Max 100 chars';
        } else {
            echo 'description is VALID';
        }
    }