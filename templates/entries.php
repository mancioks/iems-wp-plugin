<div class="wrap">
    <h1>IEMS entries</h1>
    <div class="table-responsive">
        <table class="wp-list-table widefat fixed striped table-view-list">
            <thead>
            <tr>
                <th>Key</th>
                <th>Type</th>
                <th>Value</th>
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
                            <code style="cursor: pointer;" onclick="navigator.clipboard.writeText('[iems id=<?= $entry['id'] ?>]')">
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