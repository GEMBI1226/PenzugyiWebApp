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
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction.index', compact('transactions'));
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

    public function export(Request $request)
    {
        $query = Transaction::query();

        if ($request->has('year') && $request->year != 'all') {
            $query->whereYear('date', $request->year);
        }

        if ($request->has('month') && $request->month != 'all') {
            $query->whereMonth('date', $request->month);
        }

        $transactions = $query->orderBy('date', 'desc')->get();

        $period = 'All time';
        if ($request->has('year') && $request->year != 'all') {
            $period = $request->year;
            if ($request->has('month') && $request->month != 'all') {
                $period .= '-' . str_pad($request->month, 2, '0', STR_PAD_LEFT);
            }
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('transaction.pdf', compact('transactions', 'period'));

        return $pdf->download('transactions_export_' . date('Y-m-d_H-i-s') . '.pdf');
    }
}
