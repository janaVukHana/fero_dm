<div class="action-container">
    
    <?php if($action_items) { ?>
        <?php foreach($action_items as $item) { ?>
            <article>
                <figure>
                    <img src="./<?php echo htmlspecialchars($item['file_path']); ?>" alt="Trulli" style="width:100%">
                    <figcaption>
                        <h2 class="price"><?php echo htmlspecialchars($item['title']); ?></h2>
                        <p class="desc"><?php echo htmlspecialchars($item['description']); ?></p>
                    </figcaption>
                </figure>
                <?php if($_SESSION['admin']) { ?>
                    <div class="btns-crud">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
                            <button type="submit" class="btn btn-border-white btn-del" name="delete">Delete</button>
                        </form>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
                            <button type="submit" class="btn btn-border-white btn-upd" name="update">Update</button>
                        </form>
                    </div>
                <?php } ?>
            </article>
        <?php } ?>
    <?php } else { ?>
        <h2 style="color: #fff;">There is no Action now</h2>
    <?php } ?>
   
</div>

<!-- here goes my first pagination -->
<div class="center">
    <div class="pagination">
        <?php for($i = 1; $i < $num_of_pages; $i++) { ?>
            <a class="<?php if($current_page == $i) echo htmlspecialchars('active'); ?>" href="akcija_page_controler.php?page=<?php echo htmlspecialchars($i); ?>"><?php echo htmlspecialchars($i); ?></a> 
        <?php } ?>
    </div>
</div>