<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advantage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdvantagesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.advantages.index', [
            'advantages' => Advantage::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.advantages.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $advantage = Advantage::create()->makeTranslation();

        if ($request->hasFile('advantage')) {
            $advantage->addMediaFromRequest('advantage')
                ->toMediaCollection('advantage');
        }

        if ($request->has('meta')) {
            foreach ($request->get('meta') as $key => $meta) {
                $advantage->meta()->create([
                    $key => $meta
                ]);
            }
        }
        return \redirect()->route('admin.advantages.index')
            ->with('message', 'Successfully created.');
    }

    /**
     * @param Advantage $advantage
     * @return View
     */
    public function edit(Advantage $advantage): View
    {
        return \view('admin.advantages.edit', compact('advantage'));
    }

    /**
     * @param Request $request
     * @param Advantage $advantage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Advantage $advantage)
    {

        $advantage->slug = null;
        $advantage->update();
        $advantage->updateTranslation();
        if ($request->hasFile('advantage')) {
            $advantage->clearMediaCollection('advantage');
            $advantage->addMediaFromRequest('advantage')
                ->toMediaCollection('advantage');
        }

        if($request->has('meta')){
            foreach ($request->get('meta') as $key => $meta) {
                $advantage->meta()->updateOrCreate([
                    'metable_id' => $advantage->id
                ], [
                    $key => $meta
                ]);
            }
        }
        return \redirect()->route('admin.advantages.index')
            ->with('message', 'Successfully updated.');
    }

    /**
     * @param Advantage $advantage
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Advantage $advantage)
    {
        $advantage->clearMediaCollection('advantage');
        $advantage->delete();
        return \redirect()->route('admin.advantages.index')
            ->with('message', 'Successfully deleted.');
    }
}
