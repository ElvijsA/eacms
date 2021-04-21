<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{

  public function getAllItems() {
    $items = Item::get()->toJson(JSON_PRETTY_PRINT);
    return response($items, 200);
  }

  public function getItem($id) {
      if (Item::where('id', $id)->exists()) {
        $item = Item::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($item, 200);
      } else {
        return response()->json([
          "message" => "Item not found"
        ], 404);
      }
  }

    public function createItem(Request $request) {
      $item = new Item;
      $item->title = $request->title;
      $item->description = $request->description;
      $item->save();

      return response()->json([
        "message" => "Item record created"
      ], 201);
    }

    public function updateItem(Request $request, $id) {
      if (Item::where('id', $id)->exists()) {
        $item = Item::find($id);

        $item->title = is_null($request->title) ? $item->title : $item->title;
        $item->description = is_null($request->description) ? $item->description : $item->description;
        $item->save();

        return response()->json([
          "message" => "records updated successfully"
        ], 200);
      } else {
        return response()->json([
          "message" => "Item not found"
        ], 404);
      }
    }

    public function deleteItem ($id) {
      if(Item::where('id', $id)->exists()) {
        $item = Item::find($id);
        $item->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Item not found"
        ], 404);
      }
    }
}
