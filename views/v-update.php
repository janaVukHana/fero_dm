<section class="update-section">
    <h2>Update page</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
        <!-- <div class="form-group">
            <label for="image">Image</label><br>
            <input type="file" id="image" name="image">
        </div> -->
        <!-- put image of action item here -->
        <img src="<?php echo $image['file_path'] ?>" alt="<?php echo htmlspecialchars($image['title']); ?>">
        <div class="form-group">
            <label for="title">Title</label><br>
            <input type="title" id="title" name="title" value="<?php echo htmlspecialchars($image['title']); ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label><br>
            <textarea class="description" type="description" id="description" name="description" rows="4" cols="50"><?php echo htmlspecialchars($image['description']); ?></textarea>
        </div>
        <button class="btn" type="submit">Update</button>
    </form>
</section>