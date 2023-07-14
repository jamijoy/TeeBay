<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Display the all resource.
     */
    public function showAll()
    {
        $products = DB::table('products')
                    ->orderBy('id')
                    ->get();
        return(compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $effected_count = 0;

        if ($request->action == 'buy'){

            /*
             * Function BUY
             * user uses this feature to consume product
             * so the quantity decreases
             * */

            $effected_count = DB::table('products')
                ->where('id', $request->id)
                ->decrement('quantity');
        }else if ($request->action == 'add'){

            /*
             * Function ADD
             * user uses this feature to add product to inventory
             * so the quantity increases
             * */

            $effected_count = DB::table('products')
                ->where('id', $request->id)
                ->increment('quantity');
        }else if ($request->action == 'borrow'){

            /*
             * Function BORROW
             * user uses this feature to borrow product from inventory it will be given back later
             * so the quantity decreases and borrow amount increases to use later
             * */

            $quantity = DB::table('products')
                ->select('quantity')
                ->where('id', $request->id)
                ->value('quantity');

            if ($quantity>0){
                $effected_count_one = DB::table('products')
                    ->where('id', $request->id)
                    ->decrement('quantity');
                $effected_count = DB::table('products')
                    ->where('id', $request->id)
                    ->increment('borrowed');
            }

        }

        if ($effected_count==1){
            $message = 'success';
        }else{
            $message = 'error';
        }
        return response()->json([
            'message' => $message
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $effected_count = DB::table('products')
                            ->where('id', $request->id)
                            ->delete();

        if ($effected_count==1){
            $message = 'success';
        }else{
            $message = 'error';
        }
        return response()->json([
            'message' => $message
        ]);
    }
}
