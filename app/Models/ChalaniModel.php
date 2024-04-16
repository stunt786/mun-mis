<?php

namespace App\Models;

use CodeIgniter\Model;

class ChalaniModel extends Model
{
    protected $table = 'chalani';
    protected $primaryKey = 'id';
    protected $allowedFields = ['received_date', 'subject', 'office', 'address', 'email', 'type', 'remarks', 'year','serial_number', 'user_id', 'edited_by', 'file_path'];
}
