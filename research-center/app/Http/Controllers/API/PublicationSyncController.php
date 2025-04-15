<?php

namespace App\Http\Controllers\API;

use App\Models\Researcher;
use Illuminate\Http\Request;
use App\Services\PublicationSyncService;

class PublicationSyncController extends Controller
{
    protected $syncService;

    public function __construct(PublicationSyncService $syncService)
    {
        $this->syncService = $syncService;
    }

    public function sync(Request $request)
    {
        $researcher = auth()->user()->researcher;

        if (!$researcher) {
            return redirect()->back()->with('error', 'Anda bukan peneliti.');
        }

        $this->syncService->syncFromOrcid($researcher);
        $this->syncService->syncFromScopus($researcher);
        $this->syncService->syncFromGaruda($researcher);
        $this->syncService->syncFromGoogleScholar($researcher);

        return redirect()->back()->with('success', 'Sinkronisasi publikasi berhasil!');
    }
}