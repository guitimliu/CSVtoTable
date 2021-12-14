<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSVtoTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'usec',
        'SourceIP',
        'SourcePort',
        'DestinationIP',
        'DestinationPort',
        'FQDN',
    ];
}
