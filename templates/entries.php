<div class="wrap">
    <h1>IEMS entries</h1>
    <div class="table-responsive">
        <table class="wp-list-table widefat fixed striped table-view-list">
            <thead>
            <tr>
                <th>Key</th>
                <th>Type</th>
                <th>Value</th>
                <th>Translations</th>
                <th>Shortcode</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach ($this->entries as $entry): ?>
                    <tr>
                        <td><?= $entry['id'] ?></td>
                        <td><?= $entry['type'] ?></td>
                        <td><?= $entry['value'] ?></td>
                        <td>
                            <?php foreach ($entry['translations'] as $language => $translation): ?>
                                <div style="border: 1px solid #ddd; padding: 5px; box-shadow: 0 0 10px 0px rgb(0 0 0 / 10%);border-radius: 5px;margin-bottom: 5px;">
                                    <img
                                            src="https://countryflagsapi.com/svg/<?= $language === 'en' ? 'us' : $language ?>"
                                            height="12"
                                            alt="<?= $language ?>"
                                    />
                                    <?= $translation ?>
                                </div>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <code style="cursor: pointer !important;" onclick="navigator.clipboard.writeText('[iems id=<?= $entry['id'] ?>]')">
                                [iems id=<?= $entry['id'] ?>]
                            </code>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>