<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Formulário de inscrição para concurso de magisterio superior do ICEX">
    <meta name="grecaptcha-key" content="{{config('recaptcha.v3.public_key')}}">

    <title>Formulário de inscrição</title>    
    
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <script src="https://www.google.com/recaptcha/api.js?render={{config('recaptcha.v3.public_key')}}"></script>
    <link href="{{asset('css/form-validation.css')}}" rel="stylesheet">

    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    
</head>
<body class="bg-light">

<div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Lista de contatos</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                            <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
            <th scope="col">Arquivo</th>
            <th scope="col">IP</th>
            <th scope="col">Mensagem</th>  
               

          </tr>
        </thead>
        <tbody>
            @foreach ($paginator->all() as $element)
            <tr>
                <td>{{$element->name}}</td>
                <td>{{$element->email}}</td>
                <td>{{$element->phone}}</td>
                <td><a href="download/{{$element->filename}}">{{$element->filename}}&nbsp;&nbsp;<x-icondonwload /></a></td>
                <td>{{$element->ip}}</td>
                <td>{{$element->message}}</td>
                
            </tr>
            @endforeach
          
        </tbody>
      </table>

      @if ($paginator->hasPages())
      <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
          <div class="flex justify-between flex-1 sm:hidden">
              @if ($paginator->onFirstPage())
                  <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                      {!! __('pagination.previous') !!}
                  </span>
              @else
                  <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                      {!! __('pagination.previous') !!}
                  </a>
              @endif
  
              @if ($paginator->hasMorePages())
                  <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                      {!! __('pagination.next') !!}
                  </a>
              @else
                  <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                      {!! __('pagination.next') !!}
                  </span>
              @endif
          </div>
  
          <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
              <div>
                  <p class="text-sm text-gray-700 leading-5">
                      {!! __('Mostrando') !!}
                      <span class="font-medium">{{ $paginator->firstItem() }}</span>
                      {!! __('a') !!}
                      <span class="font-medium">{{ $paginator->lastItem() }}</span>
                      {!! __('de') !!}
                      <span class="font-medium">{{ $paginator->total() }}</span>
                      {!! __('results') !!}
                  </p>
              </div>
  
              <div>
                  <span class="relative z-0 inline-flex shadow-sm rounded-md"> 
                      {{-- Pagination Elements --}}
                      @foreach ($paginator as $element)
                          {{-- "Three Dots" Separator --}}
                          @if (is_string($element))
                              <span aria-disabled="true">
                                  <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                              </span>
                          @endif
  
                          {{-- Array Of Links --}}
                          @if (is_array($element))
                              @foreach ($element as $page => $url)
                                  @if ($page == $paginator->currentPage())
                                      <span aria-current="page">
                                          <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                                      </span>
                                  @else
                                      <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                          {{ $page }}
                                      </a>
                                  @endif
                              @endforeach
                          @endif
                      @endforeach
  
                      {{-- Next Page Link --}}
                      
                  </span>
              </div>
              <a href="/">Acessar formulário</a>
          </div>
      </nav>
  @endif
  

                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</div>
    

</body>
</html>