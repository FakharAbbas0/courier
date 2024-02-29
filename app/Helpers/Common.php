<?php
/**
 * Created by PhpStorm.
 * User: Abdullah
 * Date: 11/05/2018
 * Time: 7:46 PM
 */

use App\Models\OrderTracking;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

/**
 * Current controller name
 * @return string
 */
function currentController(){
    return class_basename(Route::current()->controller);
}
function addTracking($order_id,$status_id,$type=1){
    $tracking = new OrderTracking();
    $tracking->order_id = $order_id;
    $tracking->status_id = $status_id;
    $tracking->type = $type;
    $tracking->created_by = Auth::user()->id;
    $tracking->save();
    return true;

}