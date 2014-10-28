<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-28
 * Time: 02:20 PM
 */

class ProductsController extends BaseController {

    public function getIndex()
    {
        $products = Product::all();
        return View::make( 'page.products',compact( 'products' ) );
    }



} 