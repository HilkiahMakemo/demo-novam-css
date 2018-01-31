<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Objects\SiteTree;
use App\Models\CMS\SiteMap;
use App\Models\CMS\SitePage;

class PageController extends Controller
{
  use SiteTree;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pages = SiteMap::all();
        $pid = request('parent_id') ?: -1;
        $data['Page']  = $Pages->find($pid);
        if($data['Page']){
          $data['Pages'] = $data['Page']->children;
        }
        else{
          $data['Pages'] = $Pages->where('parent_id', $pid);
        }
        $data['Tree']  = $this->PageTree($data['Pages']);
        $data['IsDev'] = $IsDev = request()->has('dev');
        $data['PageTypes'] = $this->PageTypes('Site', $IsDev);
        $data['BreadCrumbs'] = $this->BreadCrumbs($data['Page']);
        return view('cms.content.pages.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("cms.content.pages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required',
        'link'  => 'required',
      ]);
      $data = $request->except('_token');
      $Page = SiteMap::create($data);
      return back()->withSuccess('succcess!!!!');
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
        // dump($id);
        $Maps = SiteMap::all();
        if($id == 'data') {
          return $Maps->where('parent_id', -1);
        }
        $data['Map'] = $Maps->find($id);
        $Pages = $data['Map']->pages;
        $data['BreadCrumbs'] = $this->BreadCrumbs($data['Map']);

        if(!$Pages->count()){
          $Page = SitePage::create(['site_map_id' => $id]);
          $Pages = collect($data['Page'] = $Page);
        }
        else{
          $data['Page']  = $Pages->first(function($p, $i){
            return empty($p) || $p->version == 'live' || $i == 0;
          });
        }
        $data['Link']  = $this->Link($data['Page']);
        $data['Pages'] = $Maps;
        $data['PageTypes'] = $this->PageTypes('Site');

        return view('cms.content.pages.editor', $data);
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
        dump($id);
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
        $Map = SiteMap::find($id);
        $data = $request->except('_token', '_method');
        if($Map->update($data)){
          return back()->withSuccess('Successful');
        }
        return back()->withErrors(['Unable to find this']);
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
