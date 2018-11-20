<?php

namespace App\Modules\Features\E\Workflow\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workflow extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'workflow_created_at';
	const UPDATED_AT = 'workflow_updated_at';
    const DELETED_AT = 'workflow_deleted_at';
    
    protected $table = 'e_workflow';
	protected $primaryKey = 'workflow_id';
	protected $fillable = [
		'workflow_name',
		'workflow_description'
	];

	protected $dates = [
		'workflow_created_at',
		'workflow_updated_at',
		'workflow_deleted_at'
    ];
    
}
