<?php namespace App\Http\Controllers\Admin;

use EndaEditor;

class ToolController extends Controller
{
    public function editorUpload()
    {
        $data = EndaEditor::uploadImgFile('upload');
        return json_encode($data);
    }
}