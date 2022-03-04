<?php include '../todolist2/view/header.php'; ?>
<main>

    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_category" />
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Category</h2>
    <form id="add_category_form"
          action="." method="post">
        <input type="hidden" name="action" value="add_category" />

        <label>Name:</label>
        <input type="text" name="category_name" />
        <input type="submit" value="Add"/>
    </form>

    <p><a href="?action=list_items">To Do List</a></p>

</main>
<?php include '../todolist2/view/footer.php'; ?>