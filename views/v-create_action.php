<section class="create-akcija">
    <h2>New Action</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="upload">Image</label><br>
            <input type="file" id="upload" name="upload">
        </div>
        <div class="form-group">
            <label for="title">Title</label><br>
            <input type="title" id="title" name="title">
        </div>
        <!-- NOTE: change input into textarea -->
        <div class="form-group">
            <label for="description">Description</label><br>
            <input type="description" id="description" name="description">
        </div>
        <button class="btn-login" type="submit" name="create_action">Create</button>
    </form>
</section>