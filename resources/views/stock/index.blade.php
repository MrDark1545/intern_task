@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">stocks</h1>
            <div class="row">
              
                <div class="col-md-6">
                    <a href="{{ route('stock.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export
                    </a>
                </div>
                
            </div>

        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All stocks</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20%">Variant</th>
                                <th width="25%">stock</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)
                                <tr>
                                    <td>{{ $stock->variant }}</td>
                                    <td>{{ $stock->stock }}</td>
                                  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $stocks->links() }}
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    
@endsection
