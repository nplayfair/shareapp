
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            Share a Link
        </div>
        <div class="card-body">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="title">Share Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Link Title">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" class="form-control" cols="6" placeholder="Describe the link."></textarea>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" name="link" id="link" class="form-control" placeholder="Link URL">
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                <a href="<?php echo ROOT_URL;?>shares" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>
