<?php

namespace App\Http\Controllers;

use App\Models\Transaction; // Modelt beimportáljuk
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
        return view('transactions.index', compact('transactions'));
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
        return view('transactions.show', compact('transaction'));
    }

    // A többi metódus maradhat üresen egyelőre
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

