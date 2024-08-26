<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Support\Facades\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the companies.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $companies = Company::with('category')->get();

        return Response::success(
            CompanyResource::collection($companies),
            'Companies retrieved successfully'
        );
    }

    /**
     * Display the specified company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $company = Company::with('category', 'latestItems', 'newLaunches', 'products')->findOrFail($id);

        return Response::success(
            new CompanyResource($company),
            'Company retrieved successfully'
        );
    }
}
