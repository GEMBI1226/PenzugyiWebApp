<h1>Tranzakció szerkesztése</h1>

<form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Laravel trükk, mert HTML form csak POST-ot tud -->

    <label for="title">Cím:</label><br>
    <input type="text" name="title" id="title" value="{{ $transaction->title }}" required><br><br>

    <label for="amount">Összeg:</label><br>
    <input type="number" name="amount" id="amount" step="0.01" value="{{ $transaction->amount }}" required><br><br>

    <label for="type">Típus:</label><br>
    <select name="type" id="type" required>
        <option value="income" {{ $transaction->type === 'income' ? 'selected' : '' }}>Bevétel</option>
        <option value="expense" {{ $transaction->type === 'expense' ? 'selected' : '' }}>Kiadás</option>
    </select><br><br>

    <button type="submit">Frissítés</button>
</form>

<br>
<a href="{{ route('transactions.index') }}">Vissza a listához</a>
