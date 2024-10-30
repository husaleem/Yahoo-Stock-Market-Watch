<?php
include_once 'vendor/autoload.php';

$databaseClient = new MongoDB\Client();
$stockData = $databaseClient->financial_data->active_stocks->find();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock Market Overview</title>
    <style>
        table 
        {
            width: 100%;
            border-collapse: collapse;
        }
        th, td 
        {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Daily Most Active Stocks</h1>
    <table id="stockTable">
        <thead>
            <tr>
                <th onclick="sortTable(0)">Symbol</th>
                <th onclick="sortTable(1)">Name</th>
                <th onclick="sortTable(2)">Price</th>
                <th onclick="sortTable(3)">Change</th>
                <th onclick="sortTable(4)">Volume</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stockData as $stock): ?>
            <tr>
                <td><?php echo htmlspecialchars($stock['Symbol']); ?></td>
                <td><?php echo htmlspecialchars($stock['Name']); ?></td>
                <td><?php echo htmlspecialchars($stock['Price']); ?></td>
                <td><?php echo htmlspecialchars($stock['Change']); ?></td>
                <td><?php echo htmlspecialchars($stock['Volume']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
    function sortTable(column) 
    {
        var t, r, s, should_Switch, count = 0, i;
        t = document.getElementById("stockTable");
        s = true;
        let direction = 'asc';

        while (s) 
        {
            s = false;
            r = t.getElementsByTagName("tr");
            for (i = 1; i < (r.length - 1); i++) 
            {
                should_Switch = false;
                let x = r[i].getElementsByTagName("TD")[column].textContent.toLowerCase();
                let y = r[i + 1].getElementsByTagName("TD")[column].textContent.toLowerCase();
                
                if (direction === 'asc' && x > y) 
                {
                    should_Switch = true;
                    break;
                } else if (direction === 'desc' && x < y) 
                {
                    should_Switch = true;
                    break;
                }
            }
            if (should_Switch) 
            {
                r[i].parentNode.insertBefore(r[i + 1], r[i]);
                s = true;
                count++;
            } else 
            {
                if (count === 0 && direction === 'asc') 
                {
                    direction = 'desc';
                    s = true;
                } else if (count === 0 && direction === 'desc') 
                {
                    direction = 'asc';
                }
            }
        }
    }
    </script>  
</body>
</html>
