<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $attachment = Attachment::findOrFail($id);
            Storage::delete("public/{$attachment->file_path}");
            $attachment->delete();
            DB::commit();
            return back()->with('success','Removido com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return back()->withErrors('Não foi possivel realizar a operação');
        }

    }
}
