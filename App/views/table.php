<style>
    table, td, th {
        border: 1px solid lightgrey;
    }

    table {
        border-collapse: collapse;
    }
</style>

<table>
    <tr>
        <?php foreach ($columns as $column): ?>
            <th><?php echo $column; ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($models as $model): ?>
        <tr>
            <?php foreach ($functions as $function): ?>
                <td><?php echo $function($model); ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>