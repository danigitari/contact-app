<?php

namespace App\Http\Controllers;

use App\Models\DashBoard;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\Facades\Image;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $contacts = DashBoard::all();

            return response()->json(['data' => $contacts, 'code' => Response::HTTP_OK]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'code' => Response::HTTP_UNPROCESSABLE_ENTITY]);
        }

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
            'fullname' => 'required|min:3',
            'phonenumbers' => 'required',
            'email' => 'email|required',
            'file' => 'image|nullable',
        ]);

        // dd(json_encode($request->phonenumbers));
        try {
            $contact = new DashBoard();
            $contact->fullname = $request->fullname;
            $contact->phonenumbers = $request->phonenumbers;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $ImageName = 'profile';
            if($request->hasFile('file'))
            {
                $image = $request->file('file');
                $ImageName = time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(200, 160)->save(base_path('public/uploads/images/contacts/') . $ImageName);            }
            $contact->file = 'contacts/'.$ImageName;
            $contact->save();

            return response()->json(['data' => $contact, 'code' => Response::HTTP_CREATED]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'code' => Response::HTTP_UNPROCESSABLE_ENTITY]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $contact = DashBoard::findOrFail($id);
            response()->json(['data' => $contact, 'code' => Response::HTTP_OK]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'code' => Response::HTTP_UNPROCESSABLE_ENTITY]);

        }
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
        $this->validate($request, [
            'fullname' => 'required|min:3',
            'phonenumbers' => 'required',
            'email' => 'email|required',
            'file' => 'image|nullable',
        ]);

        try {
            $contact = DashBoard::findOrFail($id);
            $contact->fullname = $request->fullname;
            $contact->phonenumbers = $request->phonenumbers;
            $contact->email = $request->email;
            $ImageName='profile';
            if($request->hasFile('file'))
            {
                $image = $request->file('file');
                $ImageName = time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(200, 160)->save(base_path('public/uploads/images/contacts/') . $ImageName);            }
            $contact->file = 'contacts/'.$ImageName;
            $contact->save();

            return response()->json(['data' => $contact, 'code' => Response::HTTP_CREATED]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'code' => Response::HTTP_UNPROCESSABLE_ENTITY]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $contact = DashBoard::findOrFail($id);
            $contact->delete();

            return response()->json(['data' => "successfully deleted contact {$contact->id}"]);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'code' => Response::HTTP_UNPROCESSABLE_ENTITY]);
        }
    }
}
