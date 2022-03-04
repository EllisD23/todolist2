<?php include '../todolist2/view/header.php'; ?>
<main>
    <h1>Product List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
        </ul>
        </nav>        
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th class="right">Category</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($todoitems as $todoitem) : ?>
            <tr>
                <td><?php echo $todoitem['title']; ?></td>
                <td><?php echo $todoitem['description']; ?></td>
                <td class="right"><?php if($todoitem['categoryName'] == NULL || $todoitem['categoryName'] == FALSE){$todoitem['categoryName'] = "None";} 
                echo $todoitem['categoryName']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_item">
                    <input type="hidden" name="item_id"
                           value="<?php $todoitem['itemNum']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=add_item_form">Add To Do Item</a></p>
        <p class="last_paragraph"><a href="?action=list_categories">
                List Categories</a>
        </p>        
    </section>
</main>
<?php include '../todolist2/view/footer.php'; ?>