<div class="container-xl">
    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Backgrounds</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-condensed sortable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Preview</th>
                                    <th>Source</th>
                                    <th>Url</th>
                                    <th>Duration</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($backgrounds as $bg) {
                                    echo '<tr>';
                                    echo '<td>' . $bg->id . '</td>';
                                    if(pathinfo($bg->src)['extension'] == 'mp4') {
                                        echo '<td><a href="../' . $bg->src . '" target="_blank" class="btn btn-primary btn-sm">View video</a></td>';
                                    } else {
                                        echo '<td><img src="../' . $bg->src . '" width="70px" class="preview-bg"></td>';
                                    }
                                    echo '<td>' . $bg->src . '</td>';
                                    echo '<td>' . $bg->url . '</td>';
                                    echo '<td>' . $bg->duration . '</td>';
                                    echo '<td><a href="backgrounds/delete/' . $bg->id . '">Delete</a></td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add new background</h4>
                    </div>
                    <div class="card-body">
                        <?php if (!is_writable(FCPATH . 'assets/backgrounds/')) : ?>
                            <div class="alert alert-danger" style="margin: 10px 0 20px 0;">
                                <h2>Background directory not writeable!</h2>
                                It seems like the <code>assets/backgrounds/</code> directory is not writeable. You can try uploading a new background below, but it is likely to fail. Please make the <code>assets/backgrounds/</code> directory writeable before adding a new background.
                                <br>
                            </div>
                        <?php endif; ?>

                        <form class="form-horizontal style-form" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="add" value="1">
                            <div class="mb-3">
                                <label class="form-label">Select image / video(mp4)</label>
                                <div class="col-sm-10">
                                    <input type="file" name="file" required="required" accept="image/*,video/mp4">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Background URL</label>
                                <div class="col-sm-10">
                                    <input type="text" name="url" placeholder="Background URL to redirect to (not required)" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Background duration</label>
                                <div class="col-sm-10">
                                    <input type="number" name="duration" placeholder="The duration in seconds of this background" class="form-control">
                                    <i>This will specify how long the background stays until it switches to the other one, leave empty or set to 0 to use the default background time.</i><br>
                                    <i>If you're uploading a video then you'll need to specify the length of the video, you can't leave it empty.</i><br>
                                    <i>Specify the duration in seconds.</i>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" ><i class="fa fa-plus"></i> Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>