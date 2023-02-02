<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;
use Modules\Admin\Entities\Project;
use Modules\Admin\Http\Requests\ProjectRequest;
use Modules\Admin\Http\Requests\UpdateProjectRequest;
use Modules\Admin\Entities\ProjectImage;
use Alert;
use File;
class ProjectController extends Controller
{
    public function index()
    {
        return view('admin::projects.index');
    }

    public function create()
    {
        return view('admin::projects.create');
    }

    public function store(ProjectRequest $request)
    {
        $project=Project::create($request->except('_token','image'));
        foreach($request->image as $image){
            ProjectImage::create(['project_id'=>$project->id,'image'=>UploadFile($image)]);
        }
            Alert::success('SuccessAlert','Done Successfully');
            return redirect()->route('projects.index');
    }

    public function edit($id)
    {
        $project=Project::findOrFail($id);
        return view('admin::projects.edit',compact('project'));
    }

    public function show($id)
    {
        $project=Project::findOrFail($id);
        return view('admin::projects.show',compact('project'));
    }

    public function update(UpdateProjectRequest $request,$id)
    {
        $project=Project::findOrFail($id);
        if($request->image){
            foreach($project->images as $delete){
                File::delete(asset($delete->image));
                $delete->delete();
            }
            foreach($request->image as $image){
                ProjectImage::create(['project_id'=>$project->id,'image'=>UploadFile($image)]);
            }
        }
        $project->update($request->except('_token','image'));
        Alert::success('SuccessAlert','Done Successfully');
        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        Alert::success('SuccessAlert','Done Successfully');
        return redirect()->route('projects.index');
    }
    
    public function datatable()
    {
        $projects=Project::query();
        
        return DataTables::of($projects)
        ->addcolumn('name',function($row){
            return $row->name;
        })
        ->addcolumn('link',function($row){
            return $row->link;
        })
        ->addcolumn('body',function($row){
            return $row->body;
        })
        
        ->addcolumn('action',function($row){
                $edit='<a class="btn btn-info rounded-pill btn-sm" href="'  . Route("projects.edit",$row->id) . '"><i class="fa fa-edit"></i> Edit</a>' ;
                $show='<a class="btn btn-primary rounded-pill btn-sm" href="'  . Route("projects.show",$row->id) . '"><i class="fa fa-eye"></i> Show</a>' ;
                $delete='<a class="btn btn-danger rounded-pill btn-sm" href="'  . Route("projects.destroy",$row->id) . '"><i class="fa fa-trash"></i> Delete</a>';
            
            return $edit . ' '.  $show . ' ' . $delete ;
        })
        ->rawColumns(['action' => 'action'])
        ->make(true);
    }
    
}
