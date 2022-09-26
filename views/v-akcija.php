<!-- here goes filter menu -->
    <!-- filter for category, price... think what else... num of items per page -->
    <div class="filter-form">
        <form action="" method="GET">
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category">
                    <option value="ekseri">Ekseri</option>
                    <option value="dvoriste">Dvoriste</option>
                    <option value="moleraj" selected>Moleraj</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <select id="price" name="price">
                    <option value="asc selected">Asc</option>
                    <option value="desc">Desc</option>
                </select>
            </div>
            <div class="form-group">
                <label for="items_per_page">Items no.</label>
                <select id="items_per_page" name="items_per_page">
                    <option value="3" selected>3</option>
                    <option value="5">5</option>
                    <option value="9">9</option>
                    <option value="12">12</option>
                </select>
            </div>
            
            <button class="btn">Filter</button>
        </form>
    </div>
<!-- end of filter menu -->

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