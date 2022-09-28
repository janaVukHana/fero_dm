<section class="update-section">
    <h2>Update page</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
        
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
        <div class="form-group">
            <label for="category">Choose category</label>
            <select id="category" name="category">
                <option value="ekseri" <?php if($image['category'] == 'ekseri') echo htmlspecialchars('selected'); ?>>Ekseri</option>
                <option value="dvoriste" <?php if($image['category'] == 'dvoriste') echo htmlspecialchars('selected'); ?>>Dvoriste</option>
                <option value="moleraj" <?php if($image['category'] == 'moleraj') echo htmlspecialchars('selected'); ?>>Moleraj</option>
            </select>
        </div>
        <button class="btn" type="submit">Update</button>
    </form>
</section>