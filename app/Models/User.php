<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function validate(Request $request): \Illuminate\Http\RedirectResponse
    {
        if (!app()->make(User::class)->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ])->save()) {
            return redirect()->back()->with('error', 'Erro ao salvar os dados do usuário.');
        }

        return redirect()->back()->with('success', 'Dados do usuário salvos com sucesso.');
    }
}
