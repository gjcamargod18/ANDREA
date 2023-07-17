<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
        $role1 = Role::create(['name'=> 'administrador']);
        $role2 = Role::create(['name'=> 'administrador_prestamos']);
        $role3 = Role::create(['name'=> 'instructor']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
