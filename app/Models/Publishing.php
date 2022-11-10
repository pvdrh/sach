<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publishing extends Model
{
    protected $table = 'publishing_companies';

    public function products()
    {
        return $this->hasMany(Product::class, 'publishing_company_id');
    }
}
