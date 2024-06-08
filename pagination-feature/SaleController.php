public function showProductsModalData(Request $request)
{
    $query = ProductDatatable::getProducts()
        ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        ->leftJoin('units', 'products.unit_id', '=', 'units.id')
        ->select('products.*', 'categories.name as category_name', 'units.name as unit_name');

    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('products.name', 'like', '%' . $search . '%')
              ->orWhere('categories.name', 'like', '%' . $search . '%');
        });
    }

    $totalData = $query->count();  // Total data sebelum paginasi
    $totalFiltered = $totalData;   // Default filtered count

    $start = $request->input('start', 0);
    $length = $request->input('length', 10);

    $query->offset($start)->limit($length);

    $products = $query->get();

    return response()->json([
        'draw' => $request->input('draw'),
        'recordsTotal' => $totalData,
        'recordsFiltered' => $totalFiltered,
        'data' => $products
    ]);
}
