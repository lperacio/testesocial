<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use App\Models\Contacts;
use Illuminate\Support\Facades\Log;
use App\Helpers\TrataArquivos;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ContactFormController extends Controller
{
    public function submit(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone' => 'required|celular_com_ddd',
            'file' => 'required|max:500|mimetypes:application/pdf,application/vnd.cups-pdf,application/msword,application/vnd.oasis.opendocument.text,application/vnd.oasis.opendocument.text-master,text/plain',
        ]);

        


        $data = $request->all();
        $contact = new Contacts();
        $contact->name = $data['name'];
        $contact->phone = $data['phone'];
        $contact->email = $data['email'];
        $contact->message = $data['message'];
        $contact->ip = $request->getClientIp();   

        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload'), $fileName);
        $contact->filename = $fileName;
        
        $contact->save();
        $data['filename'] = $fileName;
        //Descomentar para enviar o email
        //alterar no arquivo de configuração .env seuemail@gmail.com 
        #Mail::to($data['email'])->send(new \App\Mail\FormContact($data));

        return response()->json(null, 200);
    }

    public function getAll() {
        return view('contatcs', [
            'paginator' => DB::table('contacts')
                            ->orderBy('id', 'asc')
                            ->paginate(15)
                            
        ]);
        
    }

    public function download($filename=null)
    {   
        try{

        
        return response()->download(public_path('upload/'.$filename)); 
        
        }catch(Exception $e){
            Log::alert($e);
        }
    }

}
