<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'ReviewID';
    public function user(){
        return $this->belongsTo(User::class,'UserID','id');
    }
    public function book(){
        return $this->belongsTo(Book::class,'BookID','BookID');
    }
    protected $fillable = ['ReviewID','UserID','BookID','Rating','Review','Date'];
    // public function getKeyName()
    // {
    //     return 'StudentID';
    // }
    public function getKeyName()
    {
        return 'ReviewID';
    }
}
