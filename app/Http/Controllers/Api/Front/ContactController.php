<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Create a new contact record in the database
        $contact = Contact::create($validatedData);

        // Return a JSON response
        return Response::success(
            $contact,
            'Contact sended successfully', [], 201
        );
    }
}
