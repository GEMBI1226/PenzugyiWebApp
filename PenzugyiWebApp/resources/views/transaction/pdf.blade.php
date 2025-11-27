<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Transactions Export</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
        .text-green {
            color: green;
        }
        .text-red {
            color: red;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .summary {
            margin-top: 20px;
            text-align: right;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Transactions Export</h1>
    
    <p>
        Period: {{ $period }}
    </p>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Description</th>
                <th>Type</th>
                <th class="text-right">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($transaction->date)->format('Y-m-d') }}</td>
                    <td>{{ $transaction->category->name ?? 'N/A' }}</td>
                    <td>{{ $transaction->description ?? '-' }}</td>
                    <td>
                        {{ $transaction->type === 'income' ? 'Income' : 'Expense' }}
                    </td>
                    <td class="text-right {{ $transaction->type === 'income' ? 'text-green' : 'text-red' }}">
                        {{ $transaction->type === 'income' ? '+' : '-' }}{{ number_format($transaction->amount, 0, ',', ' ') }} Ft
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        Total Balance: {{ number_format($transactions->where('type', 'income')->sum('amount') - $transactions->where('type', 'expense')->sum('amount'), 0, ',', ' ') }} Ft
    </div>
</body>
</html>
