<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    // foreign key relationships
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function activeEmployeesToday()
    {
        return $this->employees()
            ->whereDate('created_at', Carbon::today())
            ->where('status', '=', 'Active')
            ->where('status', '=', 'active');
    }

    public function activeEmployeesThisWeek()
    {
        return $this->employees()
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->where('status', '=', 'Active')
            ->where('status', '=', 'active');
    }
}
