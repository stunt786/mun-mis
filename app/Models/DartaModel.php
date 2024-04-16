<?php

namespace App\Models;

use CodeIgniter\Model;

class DartaModel extends Model
{
    protected $table = 'darta';
    protected $primaryKey = 'id';
    protected $allowedFields = ['received_date', 'subject', 'office', 'address', 'send_date', 'email', 'type', 'chalani', 'remarks', 'year','serial_number', 'user_id', 'edited_by', 'file_path'];
}
