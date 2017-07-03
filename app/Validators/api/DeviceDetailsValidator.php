<?php

namespace App\Validators\api;

use App\Validators\Validator;

class DeviceDetailsValidator extends Validator{

    public $rules = array(
        'device_id' => 'required',
        'device_label' => 'required',
        'reported_at' => 'required|date_format:Y-m-d H:i:s',
        'status' => 'required|in:OK,OFFLINE',
    );

}