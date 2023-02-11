<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ServicesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.services.index', [
            'services' => Service::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.services.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $service = Service::create()->makeTranslation();

        if ($request->hasFile('service')) {
            $service->addMediaFromRequest('service')
                ->toMediaCollection('service');
        }

        if ($request->has('meta')) {
            foreach ($request->get('meta') as $key => $meta) {
                $service->meta()->create([
                    $key => $meta
                ]);
            }
        }
        return \redirect()->route('admin.services.index')
            ->with('message', 'Successfully created.');
    }

    /**
     * @param Service $service
     * @return View
     */
    public function edit(Service $service): View
    {
        return \view('admin.services.edit', compact('service'));
    }

    /**
     * @param Request $request
     * @param Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Service $service)
    {

        $service->slug = null;
        $service->update();
        $service->updateTranslation();
        if ($request->hasFile('service')) {
            $service->clearMediaCollection('service');
            $service->addMediaFromRequest('service')
                ->toMediaCollection('service');
        }

        if($request->has('meta')){
            foreach ($request->get('meta') as $key => $meta) {
                $service->meta()->updateOrCreate([
                    'metable_id' => $service->id
                ], [
                    $key => $meta
                ]);
            }
        }
        return \redirect()->route('admin.services.index')
            ->with('message', 'Successfully updated.');
    }

    /**
     * @param Service $service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        $service->clearMediaCollection('service');
        $service->delete();
        return \redirect()->route('admin.services.index')
            ->with('message', 'Successfully deleted.');
    }
}
