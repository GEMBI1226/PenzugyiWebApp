<h1>Tranzakció részletei</h1>
<p><strong>ID:</strong> {{ $transaction->id }}</p>
<p><strong>Összeg:</strong> {{ $transaction->amount }}</p>
<p><strong>Dátum:</strong> {{ $transaction->date }}</p>
<a href="{{ route('transactions.index') }}">Vissza a listához</a>
