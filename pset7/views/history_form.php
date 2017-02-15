<table class="table table-striped">
            <tr>
                <th>Transaction</th>
                <th>Date/Time</th> 
                <th>Symbol</th>
                <th>Shares</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
<?php foreach ($history as $transactions): ?>
        <tr>
            <td><?= $transactions["transaction"] ?></td>
            <td><?= $transactions["time"] ?></td>
            <td><?= $transactions["symbol"] ?></td>
            <td><?= $transactions["shares"] ?></td>
            <td>$<?= number_format($transactions["price"], 2) ?></td>
            <td>$<?= number_format($transactions["price"] * $transactions["shares"], 2) ?></td>
        </tr>
<?php endforeach ?>
</table>