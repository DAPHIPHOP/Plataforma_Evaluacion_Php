<?php

use App\Student;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =new User();
        $user->name='Tomas Edison';
        $user->apellidos='Gutarra Castillo';
        $user->email='tomas@gmail.com';
        $user->password=Hash::make('12345678');
        $user->rol_id=2;
        $user->dni='45962044';
        $user->save();

        $alumno=new Student();
        $alumno->user_id=$user->id;
        $alumno->save();


        $user =new User();
        $user->name='Branco Edinson';
        $user->apellidos='Churampi Rosales';
        $user->email='branco@gmail.com';
        $user->password=Hash::make('12345678');
        $user->rol_id=2;
        $user->dni='47839405';
        $user->save();

        $alumno=new Student();
        $alumno->user_id=$user->id;
        $alumno->save();

        $user =new User();
        $user->name='Jimmy Pedro';
        $user->apellidos='Bruno Alvarado';
        $user->email='jimmy@gmail.com';
        $user->password=Hash::make('12345678');
        $user->rol_id=2;
        $user->dni='71558767';
        $user->save();

        $alumno=new Student();
        $alumno->user_id=$user->id;
        $alumno->save();

        $user =new User();
        $user->name='Diego Cesar';
        $user->apellidos='Yauli Mina';
        $user->email='diego@gmail.com';
        $user->password=Hash::make('12345678');
        $user->rol_id=2;
        $user->dni='73545825';
        $user->save();

        $alumno=new Student();
        $alumno->user_id=$user->id;
        $alumno->save();

    }
}
