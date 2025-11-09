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
            <td>
                <a href="{{ route('transactions.show', $transaction->id) }}">Részletek</a>
                <a href="{{ route('transactions.edit', $transaction->id) }}">Szerkesztés</a>
                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                    <button type="submit" onclick="return confirm('Biztosan törölni szeretnéd ezt a tranzakciót?')">
                    Törlés
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    

</table>
