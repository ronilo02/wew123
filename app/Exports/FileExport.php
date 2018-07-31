<?php 
namespace App\Exports;
use App\User;

use Maatwebsite\Excel\Concerns\FromCollection;

class FileExport implements FromCollection
{
    public function collection(){
        return User::All()->except(['id']);
    }

}