<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkWithPage;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isAdminOrEditor()) {
            $pages = Page::defaultOrder()->withDepth()->paginate(Config::get('app.pagination'));

        } else {
            $pages = Auth::user()->pages()->defaultOrder()->withDepth()->paginate(Config::get('app.pagination'));
        }

        return view('admin.pages.index')
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create')->with([
            'orderPages' => Page::defaultOrder()->withDepth()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkWithPage $request)
    {
        $page = new Page($request->only(['title','url','content']));
        Auth::user()->pages()->save($page);

        $this->updatePageOrder($page, $request);

        return redirect()->route('pages.index')->with('status', 'The page has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if(Auth::user()->cant('update',$page)) {
            return redirect()->route('pages.index');
        }

        return view('admin.pages.edit')
            ->with([
                'model' => $page,
                'orderPages' => Page::defaultOrder()->withDepth()->get()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(WorkWithPage $request, Page $page)
    {
        if(Auth::user()->cant('update',$page)) {
            return redirect()->route('pages.index');
        }

        if( $response = $this->updatePageOrder($page, $request) ){
            return $response;
        }

        $page->fill($request->only(['title','url','content']))->save();

        return redirect()->route('pages.index')->with('status', 'The page was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if(Auth::user()->cant('delete',$page)) {
            return redirect()->route('pages.index');
        }

        $page->delete();
        return redirect()->route('pages.index')->with('status', 'The page was deleted');
    }

    protected function updatePageOrder(Page $page, $request)
    {
        if( $request->has('order', 'orderPage')) {
            if( $page->id == $request->orderPage ) {
                return redirect()->route('pages.edit', ['page' => $page->id])
                    ->withInput()
                    ->withErrors(['errors'=>'Cannot order page against itself.']);
            }

            $page->updateOrder($request->order, $request->orderPage);
        }
    }
}
