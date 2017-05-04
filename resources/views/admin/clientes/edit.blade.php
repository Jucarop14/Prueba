@extends('admin.template.main')
@section('title', 'Listado de Clientes')
@section('css')
<link rel="stylesheet" href="{{asset('/theme/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection
@section('content-header')
 <h1>
        Clientes
        <small>new</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Clientes</li>
      </ol>
@endsection
@section('content')
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if($clientes->count() > 0)
              <table id="tabla" class="table table-bordered table-hover my_table">
                <thead>
                <tr>
                  <th>codigo</th>
                  <th>Tipo Documento</th>
                  <th>Numero de Documento</th>
                  <th>Cliente</th>
                  <th>Direccion</th>
                  <th>Nro de Telefono</th>
                  <th>Email</th>
                  <th>Editar</th>
                </tr>
                </thead>
                <tbody>
              @foreach($clientes as $cliente)   
                <tr data-id="{{$cliente->c_codcli}}" id="row{{$cliente->c_codcli}}">
                  <td>{{$cliente->c_codcli}}</td>
                  <td>{{$cliente->c_tipdoc}}</td>
                  <td>{{$cliente->c_numdoc}}</td>
                  <td>{{$cliente->c_nomcom}}</td>
                  <td>{{$cliente->c_desdir}}</td>
                  <td>{{$cliente->c_numtel}}</td>
                  <td>{{$cliente->c_email}}</td>
                  <td><a href="#" class="btn btn-warning btn-xs editar" ><i class="fa fa-edit"></i> Editar </a>
                  <!--<td><button type="button" onclick="updateregistro()" class="btn btn-warning btn-xs" > Editar </button></td>--> 
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>codigo</th>
                 <th>Tipo Documento</th>
                  <th>Numero de Documento</th>
                  <th>Cliente</th>
                  <th>Direccion</th>
                  <th>Nro de Telefono</th>
                  <th>Email</th>
                  <th>Editar</th>
                </tr>
                </tfoot>
              </table>
              @else
              <p>No hay nada</p>
              @endif
            </div>
            <!-- /.box-body -->
          </div>
        </div>
  </div>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close btn-cancelar" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
            {!! Form::open(['route' => ['admin.clientes.update', ':codcli'], 'method' => 'PUT', 'id' => 'form-update']) !!}
              <div class="box-body">
               <input type="text" class="form-control" id="c_codcli" name="c_codcli" placeholder="codigo"  required disabled>
                <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                   <label>Tipo Documento</label>
                    <input type="text" class="form-control" id="c_tipdoc" name="c_tipdoc" placeholder="Tipo Documento" required disabled>
                  </div>
                 </div>
                 <div class="col-md-6">
                  <div class="form-group">
                  <label for="c_numdoc">Nro Documento</label>
                  <input type="text" class="form-control" id="c_numdoc" name="c_numdoc"  placeholder="Nro Documento" required disabled>
                </div>
                 </div>
                </div>
                <div class="form-group">
                  <label for="c_nomcom">Nombre</label>
                  <input type="text" class="form-control" id="c_nomcom" name="c_nomcom" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                  <label for="c_desdir">Direccion</label>
                  <input type="text" class="form-control" id="c_desdir" name="c_desdir" placeholder="Direccion" required>
                </div>
                <div class="row">
                 <div class="col-md-6">
                 <div class="form-group">
                 <label for="c_numtel">Nro Telefono</label>
                 <div class="input-group">
                   <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" id="c_numtel" name="c_numtel" placeholder="Telefono" required>
                  </div>
                </div>
                 </div>
                 <div class="col-md-6">
                 <div class="form-group">
                  <label for="c_email">Email</label>
                  <div class="input-group">
                 
                   <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <input type="email" class="form-control" id="c_email" name="c_email" placeholder="Email" required>
                  </div>
                </div>
                 </div>
                </div>

                
              </div>
               {!! Form::close() !!}    
              <!-- /.box-body -->
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-cancelar" data-dismiss="modal" >Cancelar</button>
          <button type="button" class="btn btn-primary" id="btn-update">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
   
  
@endsection
