<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Management,App\ManagementImage,App\Workspace;
use Str,Image;

class AboutController extends Controller
{
    
    public function managements(){
        $managements = \App\Management::get();
        return view('admin.abouts.managements',['managements' => $managements]);
    }
    public function managementGet(Management $management){
        return view('admin.abouts.management',['management' => $management]);
    }
    public function managementPost(Management $management){
        DB::beginTransaction();
        try{
            $management->fill(request()->all());
            $management->save();
            DB::commit();
            return redirect()->back()->with('global','Saved Sucessfully')->with('type','success');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('global',$e->getMessage())->with('type','error');
        }
    }
    public function managementImages(Management $management){
        $managementImages = \App\ManagementImage::where('management_id',$management->id)->get();
        return view('admin.abouts.management_images',['managementImages' => $managementImages,'management' => $management]);
    }
    public function managementImageGet(Management $management){
        return view('admin.abouts.management-image',['management' => $management]);
    }
    public function managementImage(Management $management,Request $request){
        $this->validate(request(),[
            'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png,gif',
        ]);
        DB::beginTransaction();
        try
        {
            foreach(request('images') as $image)
            {
                $newImage = new ManagementImage;
                $uploadFile = $image;
                $uploadExt = $uploadFile->getClientOriginalExtension();
                $uploadFilename = Str::random(10).'.'.$uploadExt;
                $destinationPathExtraLarge = 'front-end/about_images';
                $thumbLarge = Image::make($uploadFile->getRealPath())->resize(600,800, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPathExtraLarge.'/'.$uploadFilename,100);
                $newImage->fill(['url' => $request->getSchemeAndHttpHost().'/front-end/about_images/'.$uploadFilename,'management_id' => $management->id]);
                $newImage->save();

            }
            DB::commit();
            return redirect()->route('managementImages',['management' => $management->id])->with('global','Image Uploaded Successfully')->with('type','success');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with('global',$e->getMessage())->with('type','error');
        }
    }
    /* Make Base Image */
        public function managementBaseImage(ManagementImage $image)
        {
            DB::beginTransaction();
            try{
                ManagementImage::where('management_id',$image->management_id)->update(['base_image' => 0]);
                $management = Management::where('id',$image->management_id)->update(['base_img' => $image->url]);
                $image->base_image = 1;
                $image->save();
                DB::commit();
                return redirect()->back()->with('global','Base Image Saved Successfully')->with('type','success');
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->with('global',$e->getMessage())->with('type','error');
            }
        }
    /* Make Base Image */
        public function managementImageDelete(ManagementImage $image)
        {
            DB::beginTransaction();
            try{
                if($image->base_image != 1){
                    $image->delete();
                }else{
                    return redirect()->back()->with('global','Base Image Cant delete')->with('type','success');
                }
                DB::commit();
                return redirect()->back()->with('global','Base Image Saved Successfully')->with('type','success');
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->with('global',$e->getMessage())->with('type','error');
            }
        }
     public function workspaceImages(Workspace $workspace){
        $workspaceImages = \App\Workspace::get();
        return view('admin.abouts.workspaces.workspaces_images',['workspaceImages' => $workspaceImages,'workspace' => $workspace]);
    }
    public function workspaceImageGet(Workspace $workspace){
        return view('admin.abouts.workspaces.workspaces-image',['workspace' => $workspace]);
    }
    public function workspaceImage(Workspace $workspace,Request $request){
        $this->validate(request(),[
            'images' => 'required|sometimes',
            'images.*' => 'mimes:jpeg,jpg,png,gif',
        ]);
        DB::beginTransaction();
        try
        {
            if($workspace->id)
            {
                $workspace->fill(request()->all());
                $workspace->save();
            }
            if(request('images')){
                foreach(request('images') as $image)
                {
                    $newImage = new Workspace;
                    $uploadFile = $image;
                    $uploadExt = $uploadFile->getClientOriginalExtension();
                    $uploadFilename = Str::random(10).'.'.$uploadExt;
                    $destinationPathExtraLarge = 'front-end/workspaces';
                    $thumbLarge = Image::make($uploadFile->getRealPath())->resize(800,533, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPathExtraLarge.'/'.$uploadFilename,100);
                    $newImage->fill(['url' => $request->getSchemeAndHttpHost().'/front-end/workspaces/'.$uploadFilename,]);
                    $newImage->fill(request()->all());
                    $newImage->save();
    
                }
            }
            DB::commit();
            return redirect()->route('workspaceImages',['workspace' => $workspace->id])->with('global','Image Uploaded Successfully')->with('type','success');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with('global',$e->getMessage())->with('type','error');
        }
    }
    public function workspaceImageDelete(Workspace $workspace)
    {
        DB::beginTransaction();
        try{
            $workspace->delete();
            DB::commit();
            return redirect()->back()->with('global','Deleted Successfully')->with('type','success');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('global',$e->getMessage())->with('type','error');
        }
    }
    
}