<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Illuminate\Support\Arr;

class Job extends Model{
    use HasFactory;
    protected $table='job_listings';
    // protected $fillable = ['employer_id','title', 'salary'];
    protected $guarded = [];

     public function employer(){
        return $this->belongsTo(Employer::class);
     }
     public function tags(){
        return $this->belongsToMany(Tag::class, foreignPivotKey:'job_listing_id');
     }


    // public static function find(int $id): array
    // {
    //    $job= Arr::first(static::all(), fn($job) => $job['id'] == $id);

    //    if(! $job){
    //      abort(404);
    //    }else{
    //     return $job;
    //    }
    // }
};
