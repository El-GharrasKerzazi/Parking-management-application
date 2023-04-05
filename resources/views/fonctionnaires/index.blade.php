@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
    Page | Fonctionnaire
@endsection
@section('content_header')
<a class="btn btn-outline-success" href="{{ url('admin/home') }}" role="button">Dashboard</a>
@endsection

@section('content')
<div class="container ">
    <div class="row ">
        <div class="col-md-10 mx-auto">
          <div class="row my-5">
               <div class="col-md-6 mx-auto">
                @include('layouts.alert')
               </div>
          </div>
          <div class="card my-3">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">

                  <h4>Fonctionnaire</h4>


                </div>
              </div>
              <div class="card-body">
                  <div class="col-lg-12">
                    <table id="myTable" class="table table-bordered table-striped table-warning table-responsive-lg table-hover">
                        <thead>
                           <tr>
                               <th>ID</th>
                               <th>Cin</th>
                               <th>Nom</th>
                               <th>Prenom</th>
                               <th>Age</th>
                               <th>Grade</th>
                               <th>Parc</th>
                               <th>Action</th>
                               
                       
                               
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($fonctionnaires as $key => $fonctionnaire)
                           <tr>
                               <td>{{ $key+=1 }}</td>
                               <td>{{ $fonctionnaire->cin }}</td>
                               <td>{{ $fonctionnaire->nom }}</td>
                               <td>{{ $fonctionnaire->prenom }}</td>
                               <td>{{ $fonctionnaire->age }}  <span class="font-weight-bold">ans</span></td>
                               <td>{{ $fonctionnaire->grade }}</td>
                               <td>{{ $fonctionnaire->parc->nom_parc }}</td>
                               <td class="d-flex justify-content-center align-items-center">
                                  
                                   <a href="{{ route('fonctionnaires.show' , $fonctionnaire->id) }}" 
                                      class="btn btn-sm btn-primary">
                                      <i class="fas fa-eye"></i>
                                   </a>
                                   
                                   <a href="{{ route('fonctionnaires.edit' , $fonctionnaire->id) }}" 
                                      class="btn btn-sm btn-success mx-2">
                                      <i class="fas fa-edit"></i>
                                   </a>
                                   <form  id="{{ $fonctionnaire->id }}" action="{{ route('fonctionnaires.destroy' , $fonctionnaire->id) }}" method="post">
                       
                                       @csrf
                                       @method('DELETE')
                                   </form>
                                       <button  onclick="deleteEmp({{ $fonctionnaire->id }})"
                                           type="submite" 
                                           class="btn btn-sm btn-danger">
                                           <i class="fas fa-trash"></i>
                                       </button>
                               </td>
                               
                           </tr>
                           @endforeach
                        </tbody>
                   </table>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'
                ]
            });
        });
    </script>
    @if (session()->has('success'))
    <script>
          
          Swal.fire({
          position: 'top-auto',
          icon: 'success',
          title: "{{ session()->get('success') }}",
          showConfirmButton: false,
          timer: 3500
          })
    
    </script>
        
    @endif

    

<script>
        function deleteEmp(id){
            Swal.fire({
                 title: 'Es-tu sûr?',
                 text: "Vous ne pourrez pas revenir en arrière !",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#58d622',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Oui, supprimez-le !'
                 }).then((result) => {
                 if(result.isConfirmed) {
                    document.getElementById(id).submit();
            Swal.fire(
                 'Supprimé !',
                 'Votre fichier a été supprimé.',
                 'success'
               )
             }
           })
        }
    </script>
    

@endsection