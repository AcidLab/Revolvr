<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjSkill;
use App\ProjTag;
use App\Projectinfluencer;
    use DateTime;
class ProjectController extends Controller
{
     public function addProject (Request $request)
    {
        $titre = $request->input('titre');
        $description = $request->input('description');
        $ville = $request->input('ville');
        $age = $request->input('age');
        $nbr_folowers = $request->input('nbr_folowers');
        $engagement = $request->input('engagement');
        $user_id = $request->input('user_id');
    


        $project = new Project;
        $project->titre=$titre;
        $project->description=$description;
        $project->ville=$ville;
        $project->age=$age;
        $project->nbr_folowers=$nbr_folowers;
        $project->engagement=$engagement;
        $project->user_id=$user_id;



    
        $project->save();


        while(!$project->id){}

            //AddSkills

        $skills = json_decode($request->input('skills'));



        for($i=0; $i<count($skills);$i++)
        {
            $s= new ProjSkill;
            $s->proj_id=$project->id;
            $s->skill_id=$skills[$i]->id;
            $s->save();

        }

        //AddTags

        $tags = json_decode($request->input('tags'));



        for($i=0; $i<count($tags);$i++)
        {
            $s= new ProjTag;
            $s->proj_id=$project->id;
            $s->tag_id=$tags[$i]->id;
            $s->save();

        }

        return $project;
    }


    public function updateProject(Request $request)
    {
        $id = $request->input('id');
       
        $project = Project::find($id);
        $titre = $request->input('titre');
        $description = $request->input('description');
        $ville = $request->input('ville');
        $age = $request->input('age');
        $nbr_folowers = $request->input('nbr_folowers');
        $engagement = $request->input('engagement');
        $user_id = $request->input('user_id');
    


        $project->titre=$titre;
        $project->description=$description;
        $project->ville=$ville;
        $project->age=$age;
        $project->nbr_folowers=$nbr_folowers;
        $project->engagement=$engagement;
        $project->user_id=$user_id;

        
        $project->save();
        
        return $project;
    }




    public function deleteProject(Request $request)
    {
        $id = $request->input('id');



        $project = Project::find($id);
        $project->delete();

        $skills = json_decode($request->input('skills'));
        $projskills = ProjSkill::where('proj_id','=',$id)->get();
        foreach ($projskills as $key => $value) {
            $value->delete();
        }


        $tags = json_decode($request->input('tags'));
        $projtags = ProjTag::where('proj_id','=',$id)->get();
        foreach ($projtags as $key => $value) {
            $value->delete();
        }

        return 'ok';
    }



    public function showProjectById(Request $request)
    {
        $id = $request->input('user_id');

        $project = Project::find($id);

        $tags = ProjTag::where('proj_id','=',$id)->get();

        $skills = ProjSkill::where('proj_id','=',$id)->get();

        $project->tags = $tags;

        $project->skills = $skills;

        return $project;
    }


    

    public function showProjectByUserId(Request $request)
    {
        $user_id = $request->input('user_id');

        $projects = array();

        $project = Project::where('user_id','=',$user_id)->get();

        foreach ($project as $key => $value) {

            $skills = array();
            $tags = array();
            //$datetime = new DateTime('2017-01-03 14:47:41');
            $since = $value->getTime();
            $value->since = $since;
            $projects[]=$value;
        }
        
        $success['code'] = 200;
        $success['message'] = 'Projets';
        $success['projects']=$projects;
        
        return response()->json($success);

    }



    public function Bookmark (Request $request)
    {
        $proj_id = $request->input('proj_id');

        $bookmark = Projectinfluencer::where([['project_id','=',$proj_id],['like_dislike','=','1']])->get();

        return $bookmark;
    }


    public function cancelBookmark(Request $request)
    {

        $proj_id = $request->input('proj_id');

        $bookmark= Projectinfluencer::where('project_id','=',$proj_id)->get();

        $last = $bookmark(count($bookmark)-1);

        $last->delete();
    }

    public function likeDislike (Request $request)
    {
        $proj_id = $request->input('proj_id');
        $inf_id = $request->input('inf_id');
        $likedilike = $request->input('likedilike');


        $projInf = new Projectinfluencer();

        $projInf->proj_id = $proj_id;
        $projInf->inf_id = $inf_id;
        $projInf->likedilike = $likedilike;

        $projInf->save();
        return $projInf;
    }



    public function addProjecFilter(Request $request)
    {
        $id_proj = $request->input('proj_id');

        $ville = $request->input('ville');
        $age = $request->input('age');
        $nbr_folowers = $request->input('nbr_folowers');
        $engagement = $request->input('engagement');

        $eye_color = $request->input('eye_color');
        $hair_color = $request->input('hair_color');
        $hair_type = $request->input('hair_type');
        $taille = $request->input('taille');


        $filter = new Filter();

        $filter->id_proj = $id_proj;
        $filter->ville = $ville;
        $filter->age = $age;
        $filter->nbr_folowers = $nbr_folowers;
        $filter->engagement= $engagement;
        $filter->eye_color = $eye_color;
        $filter->hair_type = $hair_type;
        $filter->hair_color = $hair_color;
        $filter->taille = $taille;

        $filter->save();

        return $filter;
    }


     public function addProfffjecFilter(Request $request)
    {
        $id_proj = $request->input('proj_id');

        $filter = Filter::find($id_proj);

        return $filter;
    }
    
    


}
