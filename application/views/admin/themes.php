<div class="container-xl">
    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <h4 class="card-title">Installed themes</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-condensed sortable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Path</th>
                                <th>Status</th>
                                <th>Actions</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($themes AS $theme) {
                                echo '
                                <tr>
                                    <td>' . $theme['name'] . '</td>
                                    <td>' . $theme['path'] . '</td>
                                    <td>' . (($theme['status'] == 'ready') ? '<span class="label label-info">In use</span>' : '<span class="label label-default">Not set</span>') . '</td>
                                    <td>' . (($theme['status'] == 'ready') ? '<a href="' . base_url() . 'admin/themes/suspend/' . $theme['id'] . '"><i class="fa fa-toggle-off"></i> Suspend</a>' : '<a href="' . base_url() . 'admin/themes/activate/' . $theme['id'] . '"><i class="fa fa-toggle-on"></i> Activate</a>') . '</td>
                                    <td><a href="' . base_url() . 'admin/themes/delete/' . $theme['id'] . '"><i class="fa fa-trash-o"></i> Remove</a></td>
                                </tr>
                                ';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if($settings['theme'] == 'modern'): ?>
    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <h4 class="card-title">Modify theme colors</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal style-form" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="color">
                            <div class="mb-3">
                                <div>
                                    <label class="form-label">Primary theme accent color</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="theme_color" placeholder="The HEX color code of the theme" value="<?php echo $settings['theme_color'] ?>" autocomplete="false">
                                        <p><em>This will change the color of the buttons, progress bar etc. Leave empty for default colors</em></p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div>
                                    <label class="form-label">Secondary theme accent color</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="theme_color_secondary" placeholder="The HEX color code of the theme" value="<?php echo $settings['theme_color_secondary'] ?>" autocomplete="false">
                                        <p><em>Some animated icons have a secondary color, you can set them here</em></p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div>
                                    <label class="form-label">Text color</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="theme_color_text" placeholder="HEX color code for text inside buttons etc." value="<?php echo $settings['theme_color_text'] ?>" autocomplete="false">
                                        <p><em>HEX color code for text inside buttons etc.</em></p>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" ><i class="fa fa-tint"></i>&nbsp;Update colors</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="page-body margins">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col">
                            <h4 class="card-title">Install new theme</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal style-form" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Theme name</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" required="required" placeholder="The name of the theme">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Theme directory name</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="path" required="required" placeholder="The directory name of the theme">
                                    <p><em>(directory that is located in the "application/views/themes/" directory) E.g. for application/views/themes/default/ you enter <b>default</b></em></p>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" ><i class="fa fa-bolt"></i>&nbsp;Add theme</button>
                        </form>
                    </div>
                </div>
            </div><!-- col-lg-12-->
        </div><!-- /row -->
    </div>
</div>

<script>
    $("input[name='theme_color'], input[name='theme_color_secondary'], input[name='theme_color_text']").spectrum();
</script>