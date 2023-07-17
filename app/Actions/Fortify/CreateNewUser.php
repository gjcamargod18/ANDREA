<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'documento' => ['required', 'string', 'max:10', 'min:2'],
            'tipo_documento' => ['required', 'string', 'max:255', 'min:4'],
            'rol' => ['required', 'string', 'max:255']
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'tipo_documento' => $input['tipo_documento'],
            'documento' => $input['documento'],
            'password' => Hash::make($input['documento']),
        ]);
        $role = $input['rol'];
        $user->assignRole($role);
        return $user;
    }
}
