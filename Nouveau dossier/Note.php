<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
	public $table="les_notes";
	protected $fillable=
	[
	'ref',	'type',	'chemin','expediteur','recepteur',	'objet',	'creerPar',	'dateCreation',	
	];
	public $timestamps=false;
}
