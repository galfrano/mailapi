<?php

namespace App\Http\Controllers;

use App\Template;
use App\Mail\ProductMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ProductMailController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->all();
        $template = Template::findOrFail($data['templateId']);
        Mail::to($data['email'])->send(new ProductMail($template));
        return response()->json(['data'=>'success'], 200);
    }
}
