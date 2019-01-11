<?php

namespace App\Modules\Features\E\Context\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Context extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'context_created_at';
	const UPDATED_AT = 'context_updated_at';
    const DELETED_AT = 'context_deleted_at';
    
    protected $table = 'e_context';
	protected $primaryKey = 'context_id';
	protected $fillable = [
		'context_description',
		'menu_id'
	];

	protected $dates = [
		'context_created_at',
		'context_updated_at',
		'context_deleted_at'
    ];
	
	/*In*/
	public function menu(){
		return $this->belongsTo(\App\Modules\Features\C\Menu\Models\Menu::class, 'menu_id');
	}
	/*Out*/
	public function context_vars(){
		return $this->hasMany(\App\Modules\Features\E\ContextVar\Models\ContextVar::class, 'context_id');
	}
}