<div class="container-xl">
    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <h4 class="card-title">Edit page <?php echo $page['title'] ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="action" value="edit_page">
                            <input type="hidden" name="id" value="<?php echo $page['id'] ?>">

                            <div class="mb-3">
                                <label class="form-label">Page title</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="title" value="<?php echo $page['title'] ?>" placeholder="Page title (shown in navbar)" required>
                                    </div>
                                </div>
                            </div>
                            <?php if($page['type'] == 'link'): ?>
                                <div class="mb-3" id="type-link">
                                    <label class="form-label">Page URL</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="content" value="<?php echo $page['content'] ?>" placeholder="URL to go to">
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="mb-3" id="type-page">
                                    <label class="form-label">Page content</label>
                                    <div class="col-sm-10">
                                        <div class="form-group" id="page">
                                            <textarea id="page-content" name="content"><?php echo $page['content'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <br>
                            <input type="submit" class="btn btn-primary" value="Edit page">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($page['type'] == 'page'): ?>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'page-content' );
    </script>
<?php endif; ?>