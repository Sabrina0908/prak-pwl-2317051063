<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $guarded = ['id'];

    // UUID primary key configuration
    public $incrementing = false;
    protected $keyType = 'string';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function getUser()
    {
        // Eager load kelas relationship and attach nama_kelas for compatibility with views
        return self::with('kelas')
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($user) {
                $user->nama_kelas = $user->kelas->nama_kelas ?? null;
                return $user;
            });
    }

    // Generate UUID when creating a new model
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function getUserById($id)
    {
        return self::with('kelas')->find($id);
    }

    public function updateUser($id, $data)
    {
        $user = self::find($id);
        if (! $user) return false;
        return $user->update($data);
    }

    public function deleteUser($id)
    {
        $user = self::find($id);
        if (! $user) return false;
        return (bool) $user->delete();
    }
}