<section class="create-akcija">
    <h2>New Action</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="upload">Image</label><br>
            <input type="file" id="upload" name="upload">
            <small class="err-msg"><?php echo $systemErrors['file_err']; ?></small>
        </div>
        <div class="form-group">
            <label for="title">Title</label><br>
            <input type="title" id="title" name="title" value="<?php echo htmlspecialchars($title) ?>">
            <small class="err-msg"><?php echo $systemErrors['title_err']; ?></small>
        </div>

        <div class="form-group">
            <label for="description">Description</label><br>
            <textarea class="description" type="description" id="description" name="description" rows="4" cols="50"><?php echo htmlspecialchars($description); ?></textarea>
            <small class="err-msg"><?php echo $systemErrors['description_err']; ?></small>
        </div>

        <div class="form-group">
            <label for="category">Choose category</label>
            <select id="category" name="category">
                <option value="ekseri">Ekseri</option>
                <option value="dvoriste">Dvoriste</option>
                <option value="moleraj" selected>Moleraj</option>
            </select>
        </div>
        
        <button class="btn" type="submit">Create</button>
    </form>
</section>