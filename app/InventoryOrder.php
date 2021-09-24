<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryOrder extends Model
{
    protected $fillable = [
        'name', 'description', 'job_id', 'created_by'
    ];
	
	protected $hidden = [
	
	];
	
	public function repository()
	{
  		return $this->hasMany(RepositoryPart::class, 'inventory_orders_parts')->withTimestamps();
	}
	public function project()
	{
  		return $this->belongsTo('App/Project', 'job_id')->withTimestamps();
	}
}