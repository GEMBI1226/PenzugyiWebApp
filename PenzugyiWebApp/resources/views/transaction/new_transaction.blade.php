<h1>Új tranzakció hozzáadása</h1>

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf <!-- Laravel biztonsági token -->

    <label for="title">Cím:</label><br>
    <input type="text" name="title" id="title" required><br><br>

    <label for="amount">Összeg:</label><br>
    <input type="number" name="amount" id="amount" step="0.01" required><br><br>

    <label for="type">Típus:</label><br>
    <select name="type" id="type" required>
        <option value="income">Bevétel</option>
        <option value="expense">Kiadás</option>
    </select><br><br>

    <button type="submit">Mentés</button>
</form>

<br>
<a href="{{ route('transactions.index') }}">Vissza a listához</a>
