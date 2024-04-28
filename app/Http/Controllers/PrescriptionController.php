<?php

namespace App\Http\Controllers;

use App\Http\Requests\Prescription\StorePrescription;
use App\Http\Requests\Prescription\UpdatePrescription;
use App\Http\Resources\Prescription\PrescriptionCollection;
use App\Http\Resources\Prescription\PrescriptionResource;
use App\Models\Prescription;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Prescription::all();
        return [
            'data' => new PrescriptionCollection($list),
            'message' => 'Resource list',
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrescription $request)
    {
        $data = $request->validated();
        $prescription = Prescription::create($data);
        return [
            'data' => new PrescriptionResource($prescription),
            'message' => 'Resource has been created successfully',
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        return [
            'data' => new PrescriptionResource($prescription),
            'message' => 'Resource details',
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrescription $request, Prescription $prescription)
    {
        $data = $request->validated();
        $res = $prescription->update($data);
        return [
            'data' => new PrescriptionResource($prescription),
            'message' => 'Resource has been updated successfully',
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        $res = $prescription->destroy($prescription);
        return [
            'message' => 'Resource has been deleted successfully',
        ];
    }
}
