<?php

namespace App\Http\Controllers\api;

use App\Exceptions\ValidationFailed;
use App\Model\DeviceDetailsModel;
use App\Transformers\DeviceDetailsTransformer;
use App\Validators\api\DeviceDetailsValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class DeviceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $device = DeviceDetailsModel::all();

            $device = \Fractal::Collection($device)
                ->transformWith(new DeviceDetailsTransformer())
                ->toArray();

            $device["data"]["message"] = "Device Details Listed successfully";
            return Response::json($device["data"], 201, [], JSON_UNESCAPED_UNICODE);
        }
        catch (ValidationFailed $v) {
            $status = 422;
            $response = array(
                "success" => false,
                "error" => 'Invalid Input',
                "error_code" => $status,
                "error_messages" => $v->getErrors()
            );
            return Response::json($response, $status, [], JSON_UNESCAPED_UNICODE);
        }
        catch (ModelNotFoundException $e) {
            $data = "Record not found with our database";
            return Response::json($data, 404, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $e) {
            $response = array(
                "success" => false,
                "error" => "Something went wrong",
                "error_code" => 500,
            );
            return Response::json($response, 500, [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DeviceDetailsValidator $validator)
    {
        try{
            $validator->validate($request->all());
            $device = new DeviceDetailsModel();
            $device->device_id = $request->input('device_id');
            $device->device_label = $request->input('device_label');
            $device->reported_at = $request->input('reported_at');
            $device->status = $request->input('status');
            $device->save();

            $device = \Fractal::Item($device)
                ->transformWith(new DeviceDetailsTransformer())
                ->toArray();
            $device["data"]["message"] = "Device information added successfully";
            return Response::json($device["data"], 201, [], JSON_UNESCAPED_UNICODE);
        }
        catch (ValidationFailed $v) {
            $status = 422;
            $response = array(
                "success" => false,
                "error" => 'Invalid Input',
                "error_code" => $status,
                "error_messages" => $v->getErrors()
            );
            return Response::json($response, $status, [], JSON_UNESCAPED_UNICODE);
        }
        catch (ModelNotFoundException $e) {
            $data = "Record not found with our database";
            return Response::json($data, 404, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $e) {
            $response = array(
                "success" => false,
                "error" => "Something went wrong",
                "error_code" => 500,
            );
            return Response::json($response, 500, [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
