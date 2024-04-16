<?php
namespace App\Controllers;

use App\Controllers\AdminBaseController;

use mysqli;

class Backup extends AdminBaseController
{

    public $title = 'Backup Management';
    public $menu = 'backup';


	public function index()
	{
		$this->permissionCheck('backup_db');
		return view('admin/export');
	}


	public function exportDB()
	{
		$this->permissionCheck('backup_db');

		$backup_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.sql';

		$this->Export_Database(false, $backup_name);

		return redirect()->back();

	}

	private function Export_Database($tables=false, $backup_name=false )
    {
		$name = env('database.default.database');

        $mysqli = new mysqli(env('database.default.hostname'), env('database.default.username'), env('database.default.password'), $name); 
        $mysqli->select_db($name);
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables    = $mysqli->query('SHOW TABLES'); 
        while($row = $queryTables->fetch_row()) 
        { 
            $target_tables[] = $row[0]; 
        }   
        if($tables !== false) 
        { 
            $target_tables = array_intersect( $target_tables, $tables); 
        }
        foreach($target_tables as $table)
        {
            $result         =   $mysqli->query('SELECT * FROM '.$table);  
            $fields_amount  =   $result->field_count;  
            $rows_num=$mysqli->affected_rows;     
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table); 
            $TableMLine     =   $res->fetch_row();
            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
                while ($row = $result->fetch_row()) {
                    if ($st_counter % 100 == 0 || $st_counter == 0) {
                        $content .= "\nINSERT INTO " . $table . " VALUES";
                    }
                    $content .= "\n(";
                    for ($j = 0; $j < $fields_amount; $j++) {
                        // Add a null check before using addslashes()
                        if (isset($row[$j])) {
                            $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                            $content .= '"' . $row[$j] . '"';
                        } else {
                            // Handle null value appropriately
                            $content .= 'NULL';
                        }
                        if ($j < ($fields_amount - 1)) {
                            $content .= ',';
                        }
                    }
                    $content .= ")";
                    if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                        $content .= ";";
                    } else {
                        $content .= ",";
                    }
                    $st_counter = $st_counter + 1;
                }
            
            
            } $content .="\n\n\n";
        }
        //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        $backup_name = $backup_name ? $backup_name : $name.".sql";
        header('Content-Type: application/octet-stream');   
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");  
        echo $content; exit;
    }

}

/* End of file Backup.php */
/* Location: ./application/controllers/Backup.php */