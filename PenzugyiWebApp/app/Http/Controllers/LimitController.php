<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryLimit;
use Illuminate\Http\Request;

class LimitController extends Controller
{
    public function index()
    {
        $categories = Category::where('type', 'expense')->get();
        $limits = auth()->user()->limits()->pluck('amount', 'category_id');

        return view('limits.index', compact('categories', 'limits'));
    }

    public function update(Request $request)
    {
        // Sanitize input: remove spaces from limits
        $input = $request->all();
        if (isset($input['limits']) && is_array($input['limits'])) {
            foreach ($input['limits'] as $key => $value) {
                if (is_string($value)) {
                    $input['limits'][$key] = str_replace(' ', '', $value);
                }
            }
        }
        $request->replace($input);

        $validated = $request->validate([
            'limits' => 'array',
            'limits.*' => 'nullable|numeric|min:0',
        ]);

        $user = auth()->user();

        foreach ($validated['limits'] as $categoryId => $amount) {
            if ($amount === null) {
                CategoryLimit::where('user_id', $user->id)
                    ->where('category_id', $categoryId)
                    ->delete();
            } else {
                CategoryLimit::updateOrCreate(
                    ['user_id' => $user->id, 'category_id' => $categoryId],
                    ['amount' => $amount]
                );
            }
        }

        return redirect()->route('limits.index')->with('success', 'Limits updated successfully!');
    }

    public function reset()
    {
        auth()->user()->limits()->delete();
        return redirect()->route('limits.index')->with('success', 'All limits have been reset.');
    }
}
