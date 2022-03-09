@extends('layouts.app')

@section('content')
    <div id="app"> 
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                    <h2>Contato</h2>
                    </div>
                    <div class="card-body">
                        <contact-form></contact-form>
                    </div>
                    <a href="/contacts">Ver lista de contatos</a>
                </div>
            </div>
        </div>
    </div>
    
@endsection
