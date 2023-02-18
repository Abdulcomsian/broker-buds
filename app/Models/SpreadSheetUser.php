<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpreadSheetUser extends Model
{
    use HasFactory;
    
    protected $table = 'spread_sheet_users';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id' , 'spreadsheet_id'];
}
