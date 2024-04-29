<?php require_once dirname(__FILE__) . '/header.php'; ?>
<div class="page-body margins">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <?php require_once dirname(__FILE__) . '/tabs.php'; ?>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-condensed sortable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Directory</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($languages as $lang) {
                                echo '<tr>';
                                    echo '<td>' . $lang->id . '</td>';
                                    echo '<td>' . $lang->name . ' ' . ($lang->path == $settings['language'] ? '<span class="badge badge-primary">Default</span>' : '') . '</td>';
                                    echo '<td>' . $lang->path . '</td>';
                                    echo '<td><a href="settings/language/default/' . $lang->path . '"><li class="fa fa-check"></li> Set default</a> | <a href="settings/language/delete/' . $lang->id . '"><li class="fa fa-trash"></li> Remove</a></td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <p><i>Language directories are located in the directory <code>/application/language/</code>, new language directories need to be added there.</i></p>
                        <form method="POST">
                            <input type="hidden" name="save" value="1">
                            <div style="margin-top: 20px; width: 500px;">
                                <div style="">
                                    <input type="text" class="form-control input-sm" name="name" placeholder="Language name">
                                    <i>The name that will be shown in the language dropdown</i>
                                </div>
                                <br>
                                <div style="">
                                    <input type="text" class="form-control input-sm" name="path" placeholder="Directory name">
                                    <i>The directory name where the language files are in.</i>
                                </div>
                                <br>
                                <div style="">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Add language">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>