<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FoodMenu extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'food_menu';

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'name', 
                            'slug',
                            'menu_id',
                            'price',
                            'image_url',
                            'display_order',                                                                            
                            'created_user', 
                            'updated_user'
                        ];
    
}
