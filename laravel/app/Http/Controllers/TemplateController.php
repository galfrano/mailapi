<?php

namespace App\Http\Controllers;
use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        return Template::all();
    }

    public function show(Template $template)
    {
        return $template;
    }

    public function store(Request $request)
    {
        $template = Template::create($request->all());
        return response()->json($template, 201);
    }

    public function update(Request $request, Template $template)
    {
        $template->update($request->all());
        return response()->json($template, 200);
    }

    public function delete(Template $template)
    {
        $template->delete();
        return response()->json(null, 204);
    }
}
