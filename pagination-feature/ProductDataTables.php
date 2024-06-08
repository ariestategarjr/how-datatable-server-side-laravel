class ProductDatatable extends Model
{
    use HasFactory;

    protected $table = 'products';

    public static function getProducts()
    {
        return DB::table('products')->select('*');
    }
}
