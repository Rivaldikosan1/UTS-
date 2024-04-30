<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUpdateRequest;
use App\Http\Requests\CreateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\support\Str;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactController extends Controller
{
    public function create(CreateContactRequest $request): JsonResponse
    {
        $Contact = Contact::create($request->validated());

        return (new ContactResource($Contact))->response()->setStatusCode(201);
    }
    
    public function update(ContactUpdateRequest $request): ContactResource
    {
        $data = $request->validated();
        $Contact = Auth::Contact();

        if (isset($data['Email'])) {
            $Contact->Email = Hash::make($data['Email']);
        }
        if (isset($data['Phone'])) {
            $Contact->Phone = $data['Phone'];
        }
        if (isset($data['Mobile'])) {
            $Contact->Mobile = $data['Mobile'];
        }
        $Contact->Contact();
        return new ContactResource($Contact);
    }
    
    public function Search(Request $request): ContactResource
    {
        $Contact = Auth::contact();
        return new ContactResource($Contact);
    }
}