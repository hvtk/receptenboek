<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DownloadedInfoController extends Controller
{
    //Have to change the code from PostController to DownloadedInfoController
    public function index()
    {
        //GET
        $data['downloaded_infos'] = DownloadedInfo::orderBy('downloadedInfoId', 'desc')->paginate(5);

        return view('downloadedInfos.index', $data);
    }

    public function create()
    {
        //GET
        return view('downloadedInfos.create');
    }

    public function store(Request $request)
    {
        //POST

        //validate requests
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,pnp,jpeg,gif,svg|max:2048',
            'description' => 'required'
        ]);

        $path = $request->file('image')->store('public/images');
        $downloadedInfo = new DownloadedInfo;
        $downloadedInfo->title = $request->title;
        $downloadedInfo->description = $request->description;
        $downloadedInfo->image = $path;
        $downloadedInfo->save();

        return redirect()->route('downloadedInfos.index')
                        ->with('success', 'DownloadeInfo has been created successfully.');
    }

    public function show(DownloadedInfo $downloadedInfo)
    {
        //GET
        return view('downloadedInfos.show', compact('downloadedInfo'));
    }

    public function edit(DownloadedInfo $downloadedInfo)
    {
        //GET
        return view('downloadedInfos.edit',compact('downloadedInfo'));
    }


    public function update(Request $request, $downloadedInfoId)
    {
        //POST

        //validate requests
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $downloadedInfo = DownloadedInfo::find($downloadedInfoId);
        if($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $downloadedInfo->image = $path;
        }
        $downloadedInfo->title = $request->title;
        $downloadedInfo->description = $request->description;
        $downloadedInfo->save();

        return redirect()->route('downloadedInfos.index')
                        ->with('success','DownloadedInfo updated successfully.');
    }

    public function destroy(DownloadedInfo $downloadedInfo)  
    {
        //DELETE
        $downloadedInfo->delete();

        return redirect()->route('downloadedInfos.index')
                        ->with('success', 'DownloadedInfo has been deleted successfully.');
    }
}
