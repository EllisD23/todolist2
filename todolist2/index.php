<?php
require('../todolist2/model/database.php');
require('../todolist2/model/category_db.php');
require('../todolist2/model/item_db.php');


    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    if($category_id == NULL || $category_id == FALSE){
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    }

    $action = filter_input(INPUT_POST,'action', FILTER_UNSAFE_RAW);
    if (!$action){
        $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
        if ($action == NULL){
            $action = 'list_items';
        }
    }

    if ($action == 'list_items') {
        $category_name = get_category_name($category_id);
        $categories = get_categories();
        $todoitems = get_items_by_category($category_id);
        include('../todolist2/view/item_list.php');

    }else if($action == 'delete_item'){
        $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
            delete_item($item_id);
            header("Location: .?item_id=$item_id");
        
    }else if($action == 'list_categories') {
        $categories = get_categories();
        include('../todolist2/view/category_list.php');

    }else if($action == 'add_item_form'){
        $category_name = get_category_name($category_id);
        $categories = get_categories();
        include('../todolist2/view/add_item_form.php');

    }else if($action == 'add_item') {
        $title = filter_input(INPUT_POST, 'title');
        $decription = filter_input(INPUT_POST, 'description');
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        //$categories = filter_input(INPUT_POST, 'catergories');
        if($title == NULL || $title == FALSE || $decription == NULL || $decription == FALSE){
            $error = "Invalid item data. Check all fields and try again.";
            include('../todolist2/view/error.php');
        }else{
            add_item($title, $decription, $category_id);
            header("Location: .?item_id=$item_id");
        }

    }else if($action == 'add_category'){
        $category_name = filter_input(INPUT_POST, 'category_name', FILTER_UNSAFE_RAW);
        if($category_name == NULL || $category_name == FALSE){
            $error = "Invalid item data. Check all fields and try again.";
            include('../todolist2/view/error.php');
        }else{
            add_category($category_name);
            header("Location: .?category_id=$category_id");
        }

    }else if($action == 'delete_category'){
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            delete_category($category_id);
            header("Location: .?categoty_id=$category_id");
    }


?>
