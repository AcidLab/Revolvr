<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Influencer;
use App\HairColor;
use App\HairStyle;
use App\EyeColor;
use App\Brand;
use App\Food;
use App\Media;
use App\Skill;
use App\Tag;
use DateTime;


class ProjectController extends Controller
{

    public function index (Request $request) {
        
        $user_id = $request->input('user_id');

        $projects = array();

        $projects = Project::where('user_id','=',$user_id)->with('country')->with('city')->with('hairColors')->with('hairStyles')
        ->with('eyesColors')->with('tags')->with('skills')->with('brands')->with('foods')->with('medias')->get();

        
        $success['code'] = 200;
        $success['message'] = 'projets';
        $success['projects']=$projects;
        
        return response()->json($success);

    }

    
    public function create (Request $request) {

        $json = $request->input('json');
        $jsonData = rtrim($json, "\n");
        $object = json_decode($jsonData,true);
        $hairColors = HairColor::all();
        $hairStyles = HairStyle::all();
        $eyesColors = EyeColor::all();
        $brands = Brand::all();
        $foods = Food::all();
        $medias = Media::all();
        $skills = array();
        $tags = array();
        $project = new Project;
        $project->title = $object['title'];
        $project->description = $object['description'];
        $project->age = $object['age'];
        $project->height = 160;
        $project->country_id = $object['country_id'];
        $project->city_id = $object['city_id'];
        $project->nbr_folowers = $object['nbr_folowers'];
        $project->engagement = $object['engagement'];
        $project->user_id = $object['user_id'];
        $project->save();

        while(!$project) {

        }

        $project->hairColors()->attach($hairColors);
        $project->hairStyles()->attach($hairStyles);
        $project->eyesColors()->attach($eyesColors);
        $project->brands()->attach($brands);
        $project->foods()->attach($foods);
        $project->medias()->attach($medias);

        

        foreach ($object['skills'] as $key) {
            
            $model = Skill::find($key['id']);
            $skills[] = $key['id'];
        }


        $project->skills()->attach($skills);


        $success['code'] = 200;
        $success['message'] = 'l\'ajout a été fait avec succès';
        return response()->json($success);

    }

    public function update (Request $request) {

        $json = $request->input('json');
        $jsonData = rtrim($json, "\n");
        $object = json_decode($jsonData,true);
        $project = Project::find($object['id']);

        $project->title = $object['title'];
        $project->description = $object['description'];
        $project->age = $object['age'];
        $project->height = $object['height'];
        $project->country_id = $object['country_id'];
        $project->city_id = $object['city_id'];
        $project->nbr_folowers = $object['nbr_folowers'];
        $project->engagement = $object['engagement'];
        $project->user_id = $object['user_id'];

        $hairColors = array();
        $hairStyles = array();
        $eyesColors = array();
        $brands = array();
        $foods = array();
        $medias = array();
        $skills = array();
        $tags = array();

        

        foreach ($object['skills'] as $key) {
            
            $model = Skill::find($key['id']);
            $skills[] = $key['id'];
        }

        foreach ($object['tags'] as $key) {
            
            $model = Tag::find($key['id']);
            $tags[] = $$key['id'];
        }

        foreach ($object['hairColors'] as $key) {
            
            $model = HairColor::find($key['id']);
            $hairColors[] = $key['id'];
        }

        foreach ($object['hairStyles'] as $key) {
            
            $model = HairStyle::find($key['id']);
            $hairStyles[] = $key['id'];
        }

        foreach ($object['medias'] as $key) {
            
            $model = Media::find($key['id']);
            $medias[] = $key['id'];
        }

        foreach ($object['foods'] as $key) {
            
            $model = Food::find($key['id']);
            $foods[] = $key['id'];
        }

        foreach ($object['brands'] as $key) {
            
            $model = Brand::find($key['id']);
            $brands[] = $key['id'];
        }

        foreach ($object['eyesColors'] as $key) {
            
            $model = EyeColor::find($key['id']);
            $eyesColors[] = $key['id'];
        }

        $project->hairColors()->sync([]);
        $project->hairStyles()->sync([]);
        $project->eyesColors()->sync([]);
        $project->brands()->sync([]);
        $project->foods()->sync([]);
        $project->medias()->sync([]);
        $project->tags()->sync([]);
        $project->skills()->sync([]);

        $project->hairColors()->attach($hairColors);
        $project->hairStyles()->sync($hairStyles);
        $project->eyesColors()->sync($eyesColors);
        $project->brands()->sync($brands);
        $project->foods()->sync($foods);
        $project->medias()->sync($medias);
        $project->tags()->sync($tags);
        $project->skills()->sync($skills);

        
        



        $project->save();

        //$project->save();
        $success['code'] = 200;
        $success['message'] = 'l\'ajout a été fait avec succès';
        return response()->json($success);
        
    }

    public function delete (Request $request) {
        
        $id = $request->input('project_id');
        $project = Project::find($id);
        $project->delete();
        $success['code'] = 200;
        $success['message'] = 'suppression du projet a été faite avec succès';
        return response()->json($success);

    }

    public function bookmark (Request $request) {
        
        $project_id = $request->input('project_id');
        $project = Project::find($project_id);
        $success['code'] = 200;
        $success['message'] = 'projets';
        $success['users']=$project->likes;
        
        return response()->json($success);

    }

    public function undo(Request $request)
    {

        $id = $request->input('project_id');
        $project = Project::find($id);
        $project->like_dislike()->first()->delete();

        $success['code'] = 200;
        $success['message'] = 'Suppression validé';
        return response()->json($success);

        
    }

    public function like_dislike (Request $request)
    {
        $project_id = $request->input('project_id');
        $influencer_id = $request->input('influencer_id');
        $action_id = $request->input('like_dislike');
        $project = Project::find($project_id);
        $user = Influencer::find($influencer_id);
        if ($action_id ==1) {
            $project->likes()->save($user,['action_id'=>1]);
        }
        else {
            $project->dislikes()->save($user,['action_id'=>0]);
        }
        //$project->save();

        $success['code'] = 200;
        $success['message'] = 'opération validé';
        return response()->json($success);
    }


    
 
}
