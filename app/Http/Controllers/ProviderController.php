<?php

namespace App\Http\Controllers;

use App\Models\provider;
use App\Http\Requests\StoreproviderRequest;
use App\Http\Requests\UpdateproviderRequest;

use App\Services\AuthStrategies\AuthStrategyInterface;
use App\Services\AuthService;
use App\Services\AuthStrategies\PostAuth;
use App\Services\AuthStrategies\TipaxAuth;

use Log;

class ProviderController extends Controller
{

    public function authenticateAllProviders()
    {
        // Fetch all active providers
        $authServices = new AuthService();
        // Log::info("all providers are:" . json_encode($providers));
        $authServices->authenticateAllProviders();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproviderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproviderRequest $request, provider $provider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(provider $provider)
    {
        //
    }
}
