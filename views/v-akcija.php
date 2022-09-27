<!-- here goes filter menu -->
    <!-- filter for category, price, time added... think what else... num of items per page -->
    <div class="filter-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
            <!-- <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category">    
                    <option value="all" <?php if(!isset($_GET['category']) || $_GET['category'] == 'all') echo htmlspecialchars('selected'); ?>>All</option>      
                    <option value="ekseri" <?php if(isset($_GET['category']) && $_GET['category'] == 'ekseri') echo htmlspecialchars('selected'); ?>>Ekseri</option>
                    <option value="dvoriste" <?php if(isset($_GET['category']) && $_GET['category'] == 'dvoriste') echo htmlspecialchars('selected'); ?>>Dvoriste</option>
                    <option value="moleraj" <?php if(isset($_GET['category']) && $_GET['category'] == 'moleraj') echo htmlspecialchars('selected'); ?>>Moleraj</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <select id="price" name="price">
                    <option value="asc" <?php if(isset($_GET['price']) && $_GET['price'] == 'asc') echo htmlspecialchars('selected'); ?>>Asc</option>
                    <option value="desc" <?php if(!isset($_GET['price']) || $_GET['price'] == 'desc') echo htmlspecialchars('selected'); ?>>Desc</option>
                </select>
            </div> -->
            <!-- <div class="form-group">
                <label for="items_per_page">Items no.</label>
                <select id="items_per_page" name="items_per_page">
                    <option value="3" <?php if(isset($_GET['items_per_page']) && $_GET['items_per_page'] == '3') echo htmlspecialchars('selected'); ?>>3</option>
                    <option value="5" <?php if(isset($_GET['items_per_page']) && $_GET['items_per_page'] == '5') echo htmlspecialchars('selected'); ?>>5</option>
                    <option value="9" <?php if(!isset($_GET['items_per_page']) || $_GET['items_per_page'] == '9') echo htmlspecialchars('selected'); ?>>9</option>
                    <option value="12" <?php if(isset($_GET['items_per_page']) && $_GET['items_per_page'] == '12') echo htmlspecialchars('selected'); ?>>12</option>
                </select>
            </div>             -->
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category">    
                    <option value="all" <?php if($filter_category == 'all') echo htmlspecialchars('selected'); ?>>All</option>      
                    <option value="ekseri" <?php if($filter_category == 'ekseri') echo htmlspecialchars('selected'); ?>>Ekseri</option>
                    <option value="dvoriste" <?php if($filter_category == 'dvoriste') echo htmlspecialchars('selected'); ?>>Dvoriste</option>
                    <option value="moleraj" <?php if($filter_category == 'moleraj') echo htmlspecialchars('selected'); ?>>Moleraj</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <select id="price" name="price">
                    <option value="asc" <?php if($filter_price == 'asc') echo htmlspecialchars('selected'); ?>>Asc</option>
                    <option value="desc" <?php if($filter_price == 'desc') echo htmlspecialchars('selected'); ?>>Desc</option>
                </select>
            </div>
            <div class="form-group">
                <label for="items_per_page">Items no.</label>
                <select id="items_per_page" name="items_per_page">
                    <option value="3" <?php if($items_per_page == '3') echo htmlspecialchars('selected'); ?>>3</option>
                    <option value="5" <?php if($items_per_page == '5') echo htmlspecialchars('selected'); ?>>5</option>
                    <option value="9" <?php if($items_per_page == '9') echo htmlspecialchars('selected'); ?>>9</option>
                    <option value="12" <?php if($items_per_page == '12') echo htmlspecialchars('selected'); ?>>12</option>
                </select>
            </div>    

            <button class="btn" name="filter">Filter</button>
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
        <?php for($i = 1; $i <= $num_of_pages; $i++) { ?>
            <a class="<?php if($current_page == $i) echo htmlspecialchars('active'); ?>" 
            href="akcija_page_controler.php?
                filter=&
                items_per_page=<?php echo htmlspecialchars($items_per_page); ?>&
                price=<?php echo htmlspecialchars($filter_price); ?>&
                category=<?php echo htmlspecialchars($filter_category); ?>&
                page=<?php echo htmlspecialchars($i); ?>">
                    <?php echo htmlspecialchars($i); ?>
            </a> 
        <?php } ?>
    </div>
</div>

<a href="http://localhost/workspace/fero_dm_project/logout_page_controler.php">Destroy session</a>