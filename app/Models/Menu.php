<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menu';

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
                            'price',
                            'image_url',
                            'display_order',
                            'status',                                                       
                            'created_user', 
                            'updated_user'
                        ];
    public function foodMenu(){
        return $this->hasMany('App\Models\FoodMenu', 'menu_id');
    }
}
