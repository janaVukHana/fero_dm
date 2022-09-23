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
                    <div class="btn-crud">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
                            <button type="submit" class="btn btn-del" name="delete">Delete</button>
                        </form>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
                            <button type="submit" class="btn btn-upd" name="update">Update</button>
                        </form>
                    </div>
                <?php } ?>
            </article>
        <?php } ?>
    <?php } else { ?>
        <h2 style="color: #fff;">There is no Action now</h2>
    <?php } ?>
    <!-- <article>
        <figure>
            <img src="./public/theme/img/akcija-trimer.jpg" alt="Trulli" style="width:100%">
            <figcaption>
                <h2 class="price">$99 Outdoor Power</h2>
                <p class="desc">Save on select Black+Decker Outdoor Power Equipment</p>
            </figcaption>
            </figure>
    </article>
    <article>
        <figure>
            <img src="./public/theme/img/akcija-gorionik.jpg" alt="Trulli" style="width:100%">
            <figcaption>
                <h2 class="price">$99 Outdoor Power</h2>
                <p class="desc">Save on select Black+Decker Outdoor Power Equipment</p>
            </figcaption>
            </figure>
    </article>
    <article>
        <figure>
            <img src="./public/theme/img/akcija-ljuljaska.jpg" alt="Trulli" style="width:100%">
            <figcaption>
                <h2 class="price">$99 Outdoor Power</h2>
                <p class="desc">Save on select Black+Decker Outdoor Power Equipment</p>
            </figcaption>
            </figure>
    </article>
    <article>
        <figure>
            <img src="./public/theme/img/akcija-busilica.jpg" alt="Trulli" style="width:100%">
            <figcaption>
                <h2 class="price">$99 Outdoor Power</h2>
                <p class="desc">Save on select Black+Decker Outdoor Power Equipment</p>
            </figcaption>
            </figure>
    </article>
    <article>
        <figure>
            <img src="./public/theme/img/akcija-busilica.jpg" alt="Trulli" style="width:100%">
            <figcaption>
                <h2 class="price">$99 Outdoor Power</h2>
                <p class="desc">Save on select Black+Decker Outdoor Power Equipment</p>
            </figcaption>
            </figure>
    </article> -->
</div>