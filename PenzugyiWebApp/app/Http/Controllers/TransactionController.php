<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * Összes tranzakció listázása
     */
    public function index()
    {
        // 1. Lekérjük az összes tranzakciót
        $transactions = Transaction::all();

        // 2. Visszaadjuk a 'transactions.index' view-t, és átadjuk a tranzakciókat
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Display the specified resource.
     * Egy tranzakció részleteinek megjelenítése
     */
    public function show($id)
    {
        // 1. Lekérjük a tranzakciót az ID alapján, ha nincs találat, 404-et dob
        $transaction = Transaction::findOrFail($id);

        // 2. Visszaadjuk a 'transactions.show' view-t, és átadjuk a tranzakciót
        return view('transaction.show', compact('transaction'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        // 1. Validálás
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category_id' => 'required|exists:categories,category_id',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        // 2. Új tranzakció létrehozása
        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->amount = $validated['amount'];
        $transaction->type = $validated['type'];
        $transaction->category_id = $validated['category_id'];
        $transaction->description = $validated['description'];
        $transaction->date = $validated['date'];

        // 3. Mentés adatbázisba
        $transaction->save();

        // 4. Visszairányítás a listához sikerüzenettel
        return redirect()->route('transactions.index')->with('success', 'Tranzakció sikeresen hozzáadva!');
    }



    public function edit($id)
    {
    // Megkeressük a tranzakciót az adatbázisban
    $transaction = \App\Models\Transaction::findOrFail($id);

    // Megjelenítjük a szerkesztő űrlapot
    return view('transaction.edit_transaction', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
    // 1. Validálás
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'type' => 'required|string|in:income,expense',
    ]);

    // 2. Tranzakció lekérése
    $transaction = \App\Models\Transaction::findOrFail($id);

    // 3. Adatok frissítése
    $transaction->title = $validated['title'];
    $transaction->amount = $validated['amount'];
    $transaction->type = $validated['type'];
    $transaction->save();

    // 4. Visszairányítás a listához sikerüzenettel
    return redirect()->route('transactions.index')->with('success', 'Tranzakció sikeresen frissítve!');
    }

    public function destroy($id)
    {
    // 1. Megkeressük a tranzakciót
    $transaction = \App\Models\Transaction::findOrFail($id);

    // 2. Töröljük az adatbázisból
    $transaction->delete();

    // 3. Visszairányítás a listához sikerüzenettel
    return redirect()->route('transactions.index')->with('success', 'Tranzakció sikeresen törölve!');
    }

}

