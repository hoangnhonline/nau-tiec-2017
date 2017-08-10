<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class NhomSanPham extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'nhomsp';

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
                            'tennhom', 
                            'display_order',                           
                            'created_user', 
                            'updated_user'
                        ];
    
}
