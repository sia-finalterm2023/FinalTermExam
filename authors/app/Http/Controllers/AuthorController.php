<?php



namespace App\Http\Controllers;
use App\Models\JobType;
use Illuminate\Http\Response;
use App\Models\Author; 
use Illuminate\Http\Request;
use App\Traits\ApiResponser; 

class AuthorController extends Controller
{
    use ApiResponser;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

public function index()
{
    $users = Author::all();
    return $this->successResponse($users);
}

public function showId($id)
{ 
    $authors = Author::findOrFail($id);
    return $this -> successResponse($authors);

}

public function add(Request $request)
{
    $rules = [
    'fullname' => 'required|max:150',
    'gender' => 'required|in:Male,Female',
    'birthday' => 'required|date_format:Y-m-d',
    ];

    $this->validate($request, $rules); 
    $author = Author::create($request->all());
  
    return $this->successResponse($author, Response::HTTP_CREATED); 
}

public function update(Request $request, $id){  
    $rules = [
    'fullname' => 'required|max:150',
    'gender' => 'required|in:Male,Female',
    'birthday' => 'required|date_format:Y-m-d',
    ];

    $this->validate($request,$rules);
    $user = Author::where('id', $id)->firstOrFail();
    $user->fill($request->all());
    
    if ($user->isClean()){
    return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $user->save();
    return $this -> successResponse($user);
}

public function delete($id)
{
    $authors = Author::findOrFail($id);
    $authors->delete();
    return $this -> successResponse('Deleted Successfully!');
}


}
