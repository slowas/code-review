<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Advertisement\AdvertisementCreateRequest;
use App\Services\AdvertisementService;

class HomeController extends Controller
{
    protected $advertisementService;

    /**
     * HomeController constructor.
     * @param AdvertisementService $advertisementService
     */
    public function __construct(AdvertisementService $advertisementService)
    {
        $this->advertisementService = $advertisementService;
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $advertisements = $this->advertisementService->paginate();
        return view('home', compact('advertisements'));
    }

    /**
     * @param AdvertisementCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdvertisementCreateRequest $request) {
        $this->advertisementService->create($request);

        return redirect()->back()->with(['success' => 'Advertisement successfuly created!']);
    }
}
