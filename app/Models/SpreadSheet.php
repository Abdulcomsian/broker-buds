<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpreadSheet extends Model
{
    use HasFactory;

    protected $table = 'spread_sheets';

    protected $primaryKey = 'id';

    protected $fillable = ['spread_sheet_id' , 'name'];

}
