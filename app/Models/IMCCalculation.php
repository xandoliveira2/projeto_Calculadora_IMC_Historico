<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IMCCalculation extends Model
{
    protected $table = 'imc_calculations';

    protected $fillable = ['height', 'weight', 'bmi'];

}

?>