<?php

namespace App\Models\Common;

use App\Models\Frontend\Review;
use app\Util\Modules\Product\Traits\ProductReconciler;
use app\Util\Modules\Product\Traits\ProductReviewsTrait;
use app\Util\Modules\Product\Traits\ProductTrait;
use app\Util\Modules\ShoppingCart\Traits\DiscountsTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Money\Currency;
use Money\Money;
use app\Util\Modules\ShoppingCart\Discounts\PercentageDiscount;

class Product extends Model
{

//    use ProductTrait, DiscountsTrait, ProductReviewsTrait, ProductReconciler;

    use ProductTrait, ProductReviewsTrait, ProductReconciler;

    protected $table= 'products';

    protected $guarded = ['id', 'created_at','updated_at','deleted_at'];

    protected $fillable = [
        'company_id',
        'name',
        'product_code',
        'relationship_id',
        'brand_id',
        'category_id',
        'subcategory_id',
        'unit_name',
        'varient',
        'size_id',
        'color_id',
        'sku',
        'product_model_id',
        'tax_id',
        'godown_id',
        'rack_id',
        'initial_price',
        'buy_price',
        'wholesale_price',
        'price',
        'unit_price',
        'reorder_point',
        'opening_qty',
        'opening_value',
        'onhand',
        'quantity',
        'committed',
        'incomming',
        'maxonlinestock',
        'minonlineorder',
        'purchase_qty',
        'sell_qty',
        'salvage_qty',
        'received_qty',
        'return_qty',
        'shipping',
        'discount',
        'description_short',
        'description_long',
        'stuff_included',
        'warranty_period',
        'image',
        'image_large',
        'sellable',
        'purchasable',
        'b2bpublish',
        'free',
        'taxable',
        'status',
        'locale',
        'admin_id',
        'deleted'

    ];


    /**
     * @param $value
     *
     * @return mixed
     */
    public function getDescriptionShortAttribute($value)
    {
        return is_serialized($value) ? unserialize($value) : $value;
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function getDescriptionLongAttribute($value)
    {
        return is_serialized($value) ? unserialize($value) : $value;
    }

    /**
     * @param $value
     *
     * @return Money
     */
    public function getRetailPriceAttribute($value)
    {
        $value = new Money((int)$value, new Currency(config('site.money.default_currency', 'USD')));

        return $value;
    }

//    public function getRetailPriceAttribute($value)
//    {
//        $value = new Money((int)$value, new Currency(config('site.money.default_currency', 'USD')));
//
//        return $value;
//    }

    /**
     * @param $value
     *
     * @return int
     */
    public function getTaxableAttribute($value)
    {
        return $value === 1;
    }

    /**
     * @param $value
     *
     * @return Money
     */
    public function getShippingAttribute($value)
    {
        return new Money((int)$value, new Currency(config('site.money.default_currency', 'USD')));
    }

    /**
     * @param $value
     *
     * @return PercentageDiscount
     */
//    public function getDiscountAttribute($value)
//    {
//        return new PercentageDiscount($value);
//    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getDeletedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }


    // RELATIONSHIPS
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class)->whereNotNull('id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_name');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function description()
    {
        return $this->hasMany(Description::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function titles()
    {
        return $this->hasMany(NameTranslation::class,'data_id','id')->where('table_id',99);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carts()
    {
        return $this->belongsToMany(\App\Models\Cart::class)->withPivot('quantity')->withTimestamps();
    }





//    public static function getItems($filter_data = array())
//    {
//        if (empty($filter_data)) {
//            return Product::all();
//        }
//
//        $query = Product::select('id as item_id', 'name', 'unitPrice', 'initialPrice', 'tax_id');
//
//        $query->where('onhand', '>', '0');
//
//        foreach ($filter_data as $key => $value) {
//            $query->where($key, 'LIKE', "%" . $value  . "%");
//        }
//
//        return $query->get();
//    }
}
