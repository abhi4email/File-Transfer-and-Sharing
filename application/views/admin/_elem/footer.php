        </div>
        <footer class="footer footer-transparent d-print-none">
            <div class="container">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item"><a href="https://docs.Abhi.com/Sharify" target="_blank" class="link-secondary">Documentation</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                Copyright © <?php echo date('Y') ?>
                                <a href="." class="link-secondary"><?php echo $settings['site_name'] ?></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://Abhi.zendesk.com/hc/en-us/articles/360025115111-Sharify-V2-changelog" target="_blank" class="link-secondary" rel="noopener">Version <?php echo $settings['version'] ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/@tabler/core@1.0.0-beta3/dist/js/tabler.min.js"></script>
    <script src="../assets/admin/assets/js/require.min.js"></script>
    <script src="../assets/admin/assets/js/dashboard.js"></script>
    <script src="../assets/admin/assets/plugins/charts-c3/plugin.js"></script>
    <script src="../assets/admin/assets/plugins/maps-google/plugin.js"></script>
    <script src="../assets/admin/assets/plugins/input-mask/plugin.js"></script>

    <script>
        requirejs.config({
            baseUrl: '../assets/admin/'
        });
    </script>
</body>
</html>