<?php

namespace App\Modules\Features\E\ContextVar\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContextVar extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'context_var_created_at';
	const UPDATED_AT = 'context_var_updated_at';
    const DELETED_AT = 'context_var_deleted_at';
    
    protected $table = 'e_context_var';
	protected $primaryKey = 'context_var_id';
	protected $fillable = [
		'context_var_code',
		'context_var_type',
		'context_var_description',
		'context_var_order',
		'context_id',
	];

	protected $dates = [
		'context_var_created_at',
		'context_var_updated_at',
		'context_var_deleted_at'
    ];
	
	/*In*/
	public function context(){
		return $this->belongsTo(\App\Modules\Features\E\Context\Models\Context::class, 'context_id');
	}
}