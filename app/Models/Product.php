<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'stock',
        'price',
        'discount_percentage', // tambahkan kolom diskon
        'start_date', // tanggal mulai diskon
        'end_date', // tanggal berakhir diskon
    ];
}