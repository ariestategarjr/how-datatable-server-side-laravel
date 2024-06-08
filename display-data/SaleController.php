class SaleController extends Controller
{
...
    public function showProductsModalData()
    {
        $products = ProductDatatable::getProducts()
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('units', 'products.unit_id', '=', 'units.id')
            ->select('products.*', 'categories.name as category_name', 'units.name as unit_name')
            ->get();

        return response()->json(['data' => $products]);
    }
...
    }
}
