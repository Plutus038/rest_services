<?php

namespace App\Transformers;

use App\Model\DeviceDetailsModel;
use League\Fractal\TransformerAbstract;

class DeviceDetailsTransformer extends TransformerAbstract
{
    public function transform(DeviceDetailsModel $doctor) {
        return [
            "id" => $doctor->id,
            "device_id" => $doctor->device_id,
            "device_label" => $doctor->device_label,
            "reported_at" => $doctor->reported_at,
            "status" => $doctor->status,
        ];
    }
}