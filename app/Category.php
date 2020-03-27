<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Category as ModelsCategory;

class Category extends ModelsCategory
{
    public function child () {
        return $this->hasMany(Category::class, 'parent_id');  
    }

    public function products () {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

    public function allProducts () {
        //dd($this->child);
        $allProducts = collect([]);
        $mainCategoryProducts = $this->products;
        $allProducts = $allProducts->concat($mainCategoryProducts);

        if($this->child->isNotEmpty()) {
            foreach($this->child as $ch) {
                $allProducts = $allProducts->concat($ch->products);
            }
        }

        //dd($allProducts);
        return $allProducts;

    }
}
