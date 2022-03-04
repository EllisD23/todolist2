<?php include '../todolist2/view/header.php'; ?>
<div id="main">
    <p class="last_paragraph">Error message: <?php echo $error; ?></p>
</div><!-- end main -->
<p><a href="?action=list_items">To Do List</a></p>
<p><a href="?action=add_item_form">Add To Do Item</a></p>
        <p class="last_paragraph"><a href="?action=list_categories">
                List Categories</a>
        </p>   
<?php include '../todolist2/view/footer.php'; ?>