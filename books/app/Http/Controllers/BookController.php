<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Book; 
use App\Models\Publisher; 
use App\Traits\ApiResponser; 


class BookController extends Controller
{
    use ApiResponser;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $users = Book::all();
        return $this->successResponse($users);
    }


    public function showId($id)
    { 
        $books = Book::findOrFail($id);
        return $this -> successResponse($books);
    }

    public function add(Request $request)
    {
        $rules = [
        'bookname' => 'required',
        'yearpublish' => 'required|numeric|date_format:Y',       
        'authorid' => 'required|numeric|min:1|not_in:0',
        ];
        $this->validate($request, $rules);
        $user = Book::create($request->all());

        return $this->successResponse($user, Response::HTTP_CREATED); 
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'bookname' => 'required',
            'yearpublish' => 'required|numeric|date_format:Y',       
            'authorid' => 'required|numeric|min:1|not_in:0',
        ];

        $this->validate($request,$rules);
        // $authors = Author::findOrFail($request->authorid);
        $user = Book::where('id', $id)->firstOrFail();
        $user->fill($request->all());
        
    //  IF NO CHANGE HAPPENED
        if ($user->isClean()){
        return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user->save();
        return $this -> successResponse($user);
    } 


    public function delete($id)
    {
        $user = Book::findOrFail($id);
        $user->delete();

        return $this -> successResponse('Deleted Successfully!');
    }


}
