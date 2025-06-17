<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent model representing a network node entity.
 */
class Node extends Model
{
    use HasFactory;

    /**
     * Attributes that can be mass assigned.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'ip_address',
        'description',
    ];
}
