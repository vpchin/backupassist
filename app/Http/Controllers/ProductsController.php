<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Keyword;
 
class ProductsController extends Controller
{

    public function create()
    {
        return view('index');
    }
    
    public function store(Request $request)
    {
    	$this->validate(request(), [
            'first_name' => 'required|uniqueName:'.$request->get("surname"),
            'surname' => 'required',
            'email' => 'required|unique:products',
            'details' => 'required',
        ]);

        $product = new Product;
        
        $product->first_name = ucwords(strtolower($request->get('first_name')));
        $product->surname = ucwords(strtolower($request->get('surname')));
        $product->email = $request->get('email');
        $product->details = ucwords(strtolower($request->get('details')));


        $keywords = Keyword::all();

        foreach($keywords as $keyword) {
            $count_str = $keyword->slug;
            $product->$count_str = substr_count(strtolower($product->details), strtolower($keyword->name));

            $keyword->total += substr_count(strtolower($product->details), strtolower($keyword->name));
            $keyword->save();
        }
        

        $product->save();

        // Mail delivery logic goes here
	    return redirect('/')->with('success', "Your interest in disaster recovery has been recorded. Thank you for your participation!");
    }
}