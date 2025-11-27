<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Transaction::query();

        // Filter by Year
        if ($request->filled('year') && $request->year != 'any') {
            $query->whereYear('date', $request->year);
        }

        // Filter by Category
        if ($request->filled('category_id') && $request->category_id != 'any') {
            $query->where('category_id', $request->category_id);
        }

        $transactions = $query->orderBy('date', 'desc')->get();

        // Get data for filters
        $categories = Category::all();
        // Get unique years from transactions
        $years = Transaction::selectRaw('YEAR(date) as year')->distinct()->orderBy('year', 'desc')->pluck('year');

        return view('transaction.index', compact('transactions', 'categories', 'years'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transaction.show', compact('transaction'));
    }

    public function create()
    {
        $categories = Category::where('type', 'expense')->get();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category_id' => 'required_if:type,expense|nullable|exists:categories,category_id',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        // Create new transaction
        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->amount = $validated['amount'];
        $transaction->type = $validated['type'];

        if ($validated['type'] === 'income') {
            $incomeCategory = Category::where('name', 'Income')->where('type', 'income')->first();
            $transaction->category_id = $incomeCategory ? $incomeCategory->category_id : null;
        } else {
            $transaction->category_id = $validated['category_id'];
        }
        $transaction->description = $validated['description'];
        $transaction->date = $validated['date'];

        // Save to database
        $transaction->save();

        // Redirect to list with success message
        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully!');
    }

    public function edit($id)
    {
        // Find the transaction in the database
        $transaction = \App\Models\Transaction::findOrFail($id);
        
        // Get categories for dropdown
        $categories = \App\Models\Category::all();

        // Display the edit form
        return view('transaction.edit_transaction', compact('transaction', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category_id' => 'required_if:type,expense|nullable|exists:categories,category_id',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        // Get transaction
        $transaction = \App\Models\Transaction::findOrFail($id);

        // Update data
        $transaction->amount = $validated['amount'];
        $transaction->type = $validated['type'];
        $transaction->category_id = $validated['category_id'];
        $transaction->description = $validated['description'];
        $transaction->date = $validated['date'];
        $transaction->save();

        // Redirect to list with success message
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    public function destroy($id)
    {
        // Find the transaction
        $transaction = \App\Models\Transaction::findOrFail($id);

        // Delete from database
        $transaction->delete();

        // Redirect to list with success message
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }

}
