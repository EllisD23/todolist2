<?php

function get_items_by_category($category_id){
   global $db;
   if ($category_id) {
       $query = 'SELECT t.itemNum, t.title, t.description, c.categoryName FROM todoitems t 
                   LEFT JOIN categories c ON t.categoryID = c.categoryID WHERE t.categoryID = :category_id ORDER BY t.itemNum';
   } else {
       $query = 'SELECT t.itemNum, t.title, t.description, c.categoryName FROM todoitems t 
                   LEFT JOIN categories c ON t.categoryID = c.categoryID ORDER BY t.itemNum';
   }
   $statement = $db->prepare($query);
   if ($category_id) {
       $statement->bindValue(':category_id', $category_id);
   }
   $statement->execute();
   $todoitems = $statement->fetchAll();
   $statement->closeCursor();
   return $todoitems;
}

 function get_item($item_id){
    global $db;
    $query = 'SELECT * FROM todoitems
              WHERE itemNum = :item_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_id', $item_id);
    $statement->execute();
    $todoitem = $statement->fetch();
    $statement->closeCursor();
    return $todoitem;
 }

 function delete_item($item_id){
    global $db;
    $query = 'DELETE FROM todoitems
              WHERE itemNum = :item_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_id', $item_id);
    $statement->execute();
    $statement->closeCursor();
 }

 function add_item($title, $description, $category_id){
     global $db;
     $query = 'INSERT INTO todoitems
                (Title, Description, categoryID)
               VALUES
                (:title, :description :category_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
 }

?>