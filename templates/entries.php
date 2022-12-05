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
                        <td>
                            Original
                            <div class="iems-entry-value">
	                            <?= $entry['value'] ?>
                            </div>
                        </td>
                        <td>
                            <?php foreach ($entry['translations'] as $language => $translation): ?>
                                <img
                                        src="https://www.countryflagicons.com/FLAT/16/<?= strtoupper($language === 'en' ? 'us' : $language) ?>.png"
                                        height="16"
                                        style="margin-bottom: -4px;"
                                        alt="<?= $language ?>"
                                />
	                            <?= strtoupper($language === 'en' ? 'us' : $language) ?>
                                <div class="iems-entry-value" style="margin-bottom: 10px;">
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