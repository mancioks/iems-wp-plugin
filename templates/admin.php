<div class="wrap">
    <h1>IEMS admin</h1>
    <?php settings_errors(); ?>
    <form action="options.php" method="post">
        <?php
            settings_fields('iems_options');
            do_settings_sections('iems_plugin');
            submit_button();
        ?>
    </form>
</div>