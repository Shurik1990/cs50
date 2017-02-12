<table class="table table-striped">
        <tr>
            <th>Your cash:</th>
        </tr>
<?php foreach ($users as $cash): ?>
        <tr>
            <td class="cash_bold">$<?= number_format($cash["cash"], 2) ?></td>
        </tr>
<?php endforeach ?>
</table>