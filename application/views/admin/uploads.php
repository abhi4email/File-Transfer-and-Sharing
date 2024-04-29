<div class="page-body margins">
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Uploads</h4>
                </div>
                <div class="card-body">
                    <?php
                    if($total_uploads == 0) :
                        ?>
                        <h4>No uploads have been found</h4>
                        <?php
                    else:
                        ?>
                        <table class="table table-bordered table-striped table-condensed sortable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Owner</th>
                                <th>Message</th>
                                <th>Upload date</th>
                                <th>Expire date</th>
                                <th>Files count</th>
                                <th>Total downloads</th>
                                <th>Status</th>
                                <th>Share type</th>
                                <th>Password</th>
                                <th>Size (MB)</th>
                                <th>IP</th>
                                <th>Destruct</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($uploads as $row) {
                                    echo '
                                    <tr>
                                        <td><a href="' . $settings['site_url'] . $row['upload_id'] . '/' . $row['secret_code'] . '" target="_blank">' . $row['upload_id'] . '</a></td>
                                        <td>' . (($row['share'] == 'mail') ? $row['email_from'] : 'Link (No email)') . '</td>
                                        <td width="15%">' . $row['message'] . '</td>
                                        <td>' . date("F j, Y, g:i a", $row['time']) . '</td>
                                        <td>' . date("F j, Y, g:i a", $row['time_expire']) . '</td>
                                        <td>' . $row['count'] . '</td>
                                        <td>' . $row['total_downloads'] . '</td>
                                        <td>' . $file_status[$row['status']] . '</td>
                                        <td>' . $row['share'] . '</td>
                                        <td>' . (strtoupper($row['password']) == 'EMPTY' || empty($row['password']) ? 'No'  : 'Yes') . '</td>
                                        <td>' . (!empty($row['size']) ? (($row['size'] < 1048576) ? round($row['size'] / 1024, 2) . ' KB' : round($row['size'] / 1048576, 2) . ' MB') : 'Not available yet').'</td>
                                        <td>' . $row['ip'] . '</td>
                                        <td>' . $row['destruct'] . '</td>
                                        <td>' . ($row['status'] == 'ready' ? '<a href="' . $settings['site_url'] . 'admin/uploads/page/' . $page . '/delete/' . $row['upload_id'] . '" onclick="return confirm(\'Are you sure you want to delete this upload ?\')"><i class="fa fa-trash"></i> Destroy</a>' : '') . '</td>
                                    </tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                        <?php
                        // Pagination script
                        $total_pages = round($total_uploads / 30);
                        $page_up = $page + 1;
                        $page_down = $page - 1;
                        ?>
                        <div style="float: right; padding-right: 10px;">
                            <?php if($page > 0): ?>
                                <a href="<?php echo $settings['site_url'] . 'admin/uploads/page/' . $page_down; ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Prev</a>
                            <?php
                            endif;
                            if($total_pages > ($page + 1)) :
                            ?>
                                <a href="<?php echo $settings['site_url'] . 'admin/uploads/page/' . $page_up; ?>" class="btn btn-primary">Next <i class="fa fa-arrow-right"></i></a>
                            <?php endif; ?>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
