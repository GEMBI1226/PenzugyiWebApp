<h1>Tranzakciók</h1>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Összeg</th>
            <th>Dátum</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->date }}</td>
            <td><a href="{{ route('transactions.show', $transaction->id) }}">Részletek</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
