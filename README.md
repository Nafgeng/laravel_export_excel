Cara membuat export dari laravel ke excel :


1. buat projek { composer create-project laravel/laravel example-app }

2. config database nya { samain nama database dengan yang ada di file .env }

3. install composer { composer require maatwebsite/excel --with-all-dependencies }

4. jangan lupa untuk me-register di config/app.php {
    'providers' => [
    /*
     * Package Service Providers...
     */
    Maatwebsite\Excel\ExcelServiceProvider::class,
]
    'aliases' => [
    ...
    'Excel' => Maatwebsite\Excel\Facades\Excel::class,
]
}

5. publish confignya { php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config
 }
nb : config ini otomatis akan membuat file yg bernama config/excel.php

6. membuat data dummy dari tinker {
    php artisan tinker

    thinker User::factory()->count(500)->create()
 }

7. tambahkan route(di file web.php) {
    <?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\ExportExcelController;
  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::controller(ExportExcelController::class)->group(function(){
    Route::get('/', 'index');    
    Route::get('export/excel', 'export')->name('export.excel');
});
}

8. membuat controller {
    php artisan make:controller ExportExcelController

    lalu samakan dengan kode di bawah ini :

    <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
     public function index()
    {
       return view('index');
    }

    public function export() 
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }    
}
}

9. membuat export class {
    php artisan make:export ExportUsers --model=User

    lalu samakan dengan kode dibawah ini :

    <?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUsers implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return User::all();
    }
}
}

10. membuat file blade untuk view-nya {
    untuk namanya bisa gunakan ; index.blade.php

    dan untuk kodenya ada dibawah ini :
    <!DOCTYPE html>
<html lang="en">
<head>
  <title>How To Export Excel File In Laravel 9 - Techsolutionstuff</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h3>How To Export Excel File In Laravel 9 - Techsolutionstuff</h3>
	<form action="#" method="POST" name="importform"
	  enctype="multipart/form-data">
		@csrf		
		<div class="form-group">
			<a class="btn btn-info" href="{{ route('export.excel') }}">Export Excel File</a>
		</div> 
	</form>
</div>
</body>
</html>
}

11. jangan lupa untuk di run projectnya {
    php artisan serve
}

Untuk yang ingin mengikuti dengan lebih lanjut kalian bisa melihat website ini ygy :
https://techsolutionstuff.com/post/how-to-export-excel-file-in-laravel-9
untuk install pakai composer require maatwebsite/excel --with-all-dependencies
untuk bikin user pakai thinker User::factory()->count(500)->create()
