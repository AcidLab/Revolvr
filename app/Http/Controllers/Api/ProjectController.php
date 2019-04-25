<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjSkill;
use App\ProjTag;
use App\Projectinfluencer;
use DateTime;
use App\Filter;

use App\Projhome;
use App\Projhairtype;
use App\Projhairlength;
use App\Projhaircolor;
use App\Projeyescolor;
use App\Projcut;
use App\Projcomplexion;
use App\Projclothscut;
use App\Projshoesize;

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


    

        $success['code'] = 200;
        $success['message'] = 'création du projet a été faite avec succès';
        $success['project'] = $project
        return response()->json($success);


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


        //filter

        //shoesizes
        $shoesizes = json_decode($request->input('shoesizes'));
        for($i=0; $i<count($shoesizes);$i++)
        {
            $s= new Projshoesize;
            $s->proj_id=$id;
            $s->label=$shoesizes[$i]->label;
            $s->save();
        }


        //homes
        $homes = json_decode($request->input('homes'));
        for($i=0; $i<count($homes);$i++)
        {
            $s= new Projhome;
            $s->proj_id=$id;
            $s->home_id=$homes[$i]->id;
            $s->save();
        }

        //hairtypes
        $hairtypes = json_decode($request->input('hairtypes'));
        for($i=0; $i<count($hairtypes);$i++)
        {
            $s= new Projhairtype;
            $s->proj_id=$id;
            $s->hairtype_id=$hairtypes[$i]->id;
            $s->save();
        }

        //hairlegths
        $hairlegths = json_decode($request->input('hairlegths'));
        for($i=0; $i<count($hairlegths);$i++)
        {
            $s= new Projhairlength;
            $s->proj_id=$id;
            $s->label=$hairlegths[$i]->label;
            $s->save();
        }

        //haircolors
        $haircolors = json_decode($request->input('haircolors'));
        for($i=0; $i<count($haircolors);$i++)
        {
            $s= new Projhaircolor;
            $s->proj_id=$id;
            $s->haircolor_id=$haircolors[$i]->id;
            $s->save();
        }

        //eyescolors
        $eyescolors = json_decode($request->input('eyescolors'));
        for($i=0; $i<count($eyescolors);$i++)
        {
            $s= new Projeyescolor;
            $s->proj_id=$id;
            $s->eyes_color=$eyescolors[$i]->id;
            $s->save();
        }

        //cuts
        $cuts = json_decode($request->input('cuts'));
        for($i=0; $i<count($cuts);$i++)
        {
            $s= new Projcut;
            $s->proj_id=$id;
            $s->label=$cuts[$i]->label;
            $s->save();
        }

        //complexions
        $complexions = json_decode($request->input('complexions'));
        for($i=0; $i<count($complexions);$i++)
        {
            $s= new Projcomplexion;
            $s->proj_id=$id;
            $s->complexion_id=$complexions[$i]->id;
            $s->save();
        }

        //clothescut
        $clothescut = json_decode($request->input('clothescut'));
        for($i=0; $i<count($clothescut);$i++)
        {
            $s= new Projclothscut;
            $s->proj_id=$id;
            $s->label=$clothescut[$i]->label;
            $s->save();
            
        }

        
        $project->save();
        
        $success['code'] = 200;
        $success['message'] = 'modification du projet a été faite avec succès';
        $success['project'] = $project
        return response()->json($success);
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

        $success['code'] = 200;
        $success['message'] = 'suppression du projet a été faite avec succès';
        return response()->json($success);
    }



    public function showProjectByProjId(Request $request)
    {
        $id = $request->input('user_id');

        $project = Project::find($id);

        $tags = ProjTag::where('proj_id','=',$id)->get();

        $skills = ProjSkill::where('proj_id','=',$id)->get();

        $project->tags = $tags;

        $project->skills = $skills;

        $success['code'] = 200;
        $success['message'] = ' le retour de details du projet a été faite avec success ';
        $success['project'] = $project
        return response()->json($success);
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
        $success['message'] = 'projets';
        $success['projects']=$projects;
        
        return response()->json($success);

<<<<<<< HEAD
        $success['code'] = 200;
        $success['message'] = ' les projets du User X sont : ';
        $success['project'] = $projects
        return response()->json($success);
=======
>>>>>>> d82b8d62e1dc30f82b245d5787478233ac6f344b
    }



    public function getBookmark (Request $request)
    {
        $proj_id = $request->input('project_id');

        $bookmark = Projectinfluencer::where([['project_id','=',$proj_id],['like_dislike','=','1']])->get();
        $influencers = array();
        foreach ($bookmark as $key => $value) {

            $influencers[] = $value->influencer;
        } 
        $success['code'] = 200;
        $success['message'] = 'influencers';
        $success['users']=$influencers;
        return response()->json($success);
    }


    public function cancelBookmark(Request $request)
    {

        $proj_id = $request->input('proj_id');

        $book= Projectinfluencer::where('project_id','=',$proj_id)->orderBy('created_at', 'desc')->first();


        $book->delete();

        $success['code'] = 200;
        $success['message'] = 'Suppression validé';
        return response()->json($success);

        
    }

    public function likeDislike (Request $request)
    {
        $project_id = $request->input('project_id');
        $influencer_id = $request->input('influencer_id');
        $like_dislike = $request->input('like_dislike');


        $projInf = new Projectinfluencer();

        $projInf->project_id = $project_id;
        $projInf->influencer_id = $influencer_id;
        $projInf->like_dislike = $like_dislike;

        $projInf->save();

        $success['code'] = 200;
        $success['message'] = 'opération validé';
        return response()->json($success);
    }


    public function getFilter (Request $request)
    {
        $proj_id = $request->input('proj_id');

        $filter = Filter::where('proj_id','=',$proj_id)->get();
        $success['code'] = 200;
        $success['message'] = 'Suppression validé';
        $success['filter'] = $filter;
        return response()->json($success);
    }
    
 
}
