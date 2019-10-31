<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display all the items in cart.
     * 
     * @return array
     */
    public function index()
    {
        $user = auth()->user();
        $cart = Cart::with('cart_items', 'cart_items.product')
            ->where('user_id', $user->id)
            ->first();
        
        return response()->json([
            'cart' => $cart,
        ]);
    }

    /**
     * Display an item selected from cart.
     * 
     * @param $id for an item in cart
     * @return object
     */
    public function show($id)
    {
        $item = CartItem::findOrFail($id);
        
        return response()->json($item);
    }

    /**
     * Add an item into the cart.
     * 
     * @return object
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $cart_id = $this->getCartId();

        try {
            $item = CartItem::create([
                'cart_id' => $cart_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);

            return response()->json([
                'item' => $item,
                'message' => 'Item was added in cart.'
            ]);
        } catch (Exception $error) {
            return response()->json([
                'error_message' => $error,
            ]);
        }
    }

    /**
     * Updates the existing item in cart.
     * 
     * @param $request, $id
     * @return object
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        try {
            $item = CartItem::findOrFail($id);
            $item->product_id = $request->product_id;
            $item->quantity = $request->quantity;
            $item->save();

            return response()->json([
                'item' => $item,
                'message' => 'The item in cart was updated successfully.'
            ]);
        } catch (Exception $error) {
            return response()->json([
                'error_message' => $error,
            ]);
        }
    }

    /**
     * Removes an item from cart.
     * 
     * @param $id 
     * @return object
     */
    public function destroy($id)
    {
        $item = CartItem::findOrFail($id);

        if ($item->delete()) {
            return response()->json([
                'message' => 'Item has been deleted successfully!',
            ]);
        }
    }

    /**
     * Takes the authenticated user's cart id.
     * 
     * @return integer
     */
    private function getCartId()
    {
        $user = auth()->user();
        $cart = Cart::findOrFail($user->id);

        return $cart->id;
    }
}
