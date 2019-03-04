<div class="container">
    <?php if (isset($_SESSION['is_logged_in'])) : ?>
    <a href="<?php echo ROOT_URL; ?>shares/add" class="btn btn-success btn-share">Share Something</a>
    <?php endif; ?>
    <?php foreach($viewmodel as $item) : ?>
        <div class="card my-2 text-left">
            <div class="card-body">
                <h3 class="card-title"><?php echo $item['title']; ?></h3>
                <p><?php echo $item['body']; ?></p>
                <a href="<?php echo $item['link']; ?>" class="btn btn-primary" target="_blank">Go to Link</a>
            </div>
            <div class="card-footer text-muted">
                <small>Shared on <?php echo $item['create_date']; ?></small>
            </div>
        </div>
    <?php endforeach; ?>
</div>