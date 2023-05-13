@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
    Page | Fonctionnaire
@endsection


@section('content')
<div class="container ">
    <div class="row ">
        <div class="col-md-4 mt-4">
            <div class="small-box" style="background-color: rgb(60, 233, 89)">
             <div class="inner">
                 <h3>{{ \App\Models\Mission::count() }}</h3>
                 <p class="text-bold">Mission</p>
             </div>
             <div class="icon">
                 <i class="fas fa-spinner"></i>
             </div>
             <a href="{{ url('admin/missions') }}" class="small-box-footer">
             more info <i class="fas fa-arrow-circle-right"></i>
             </a>
            </div>
        </div>

        <div class="col-md-8 mt-4">
            <div class="small-box" style="background-color: rgb(240, 45, 191)">
             <div class="inner">
                 <h3>{{ \App\Models\Fonctionnaire::count() }}</h3>
                 <p class="text-bold">Fonctionnaire</p>
             </div>
             <div class="icon">
                 <i class="fas fa-user-circle"></i>
             </div>
             <a href="{{ url('admin/fonctionnaires') }}" class="small-box-footer">
             more info <i class="fas fa-arrow-circle-right"></i>
             </a>
            </div>
        </div>

       
          {{-- <div class="row my-5">
               <div class="col-md-6 mx-auto">
                @include('layouts.alert')
               </div>
          </div> --}}
         <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header">
                    <div class="text-center font-weight-bold">
     
                       <h4 class="btn btn-info">Fonctionnaiare</h4>
     
     
                     </div>
                   </div>
                  <div class="card-body">
                      <div class="col-lg-12">
                        <table id="myTable" class="table table-bordered table-striped  table-responsive-md table-hover">
                            <thead style="background-color: rgb(106, 63, 112);color:aliceblue">
                               <tr>
                                   <th>ID</th>
                                   <th>Cin</th>
                                   <th>Nom</th>
                                   <th>Prenom</th>
                                   <th>Sexe</th>
                                   <th>DateNaissance</th>
                                   <th>Adresse</th>
                                   <th>Service</th>
                                   <th>Action</th>
                                   
                           
                                   
                               </tr>
                            </thead>
                            <tbody>
                               @foreach ($fonctionnaires as $key => $fonctionnaire)
                               <tr>
                                   <td>{{ $key+=1 }}</td>
                                   <td>{{ $fonctionnaire->Cin }}</td>
                                   <td>{{ $fonctionnaire->Nom }}</td>
                                   <td>{{ $fonctionnaire->Prenom }}</td>
                                   <td>{{ $fonctionnaire->Sexe }}</td>
                                   <td>{{ $fonctionnaire->DateNaissance }}</td>
                                   <td>{{ $fonctionnaire->Adresse }}</td>
                                   <td>{{ $fonctionnaire->Service }}</td>
                                   <td class="d-flex justify-content-center align-items-center">
                                      
                                    <a href="javascript:void(0)"
                                    id="show-user"
                                    data-url="{{ route('fonctionnaires.show', $fonctionnaire->id) }}"
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
</div>

{{-- ******************************************* --}}

<!-- Modal -->
<div class="modal fade" id="userShowModal" tabindex="-1" role="dialog" aria-labelledby="userShowModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="userShowModal" style="font-weight: bold">Détails de fonctionnaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card bg-primary mb-3" style="max-width: 30rem;">
                    <div class="card-header">Fonctionnaire</div>
                    <div class="card-body">
                      {{-- <h5 class="card-title">détails de carburant</h5><br> --}}
                      <p><strong>Cin:</strong> <span id="Cin"></span></p>
                      <p><strong>Nom:</strong> <span id="Nom"></span></p>
                      <p><strong>Prenom:</strong> <span id="Prenom"></span></p>
                      <p><strong>Sexe:</strong> <span id="Sexe"></span></p>
                      <p><strong>Date Naissance:</strong> <span id="DateNaissance"></span></p>
                      <p><strong>Lieu Naissance:</strong> <span id="LieuNaissance"></span></p>
                      <p><strong>Email:</strong> <span id="Email"></span></p>
                      <p><strong>Telephone:</strong> <span id="Tel"></span></p>
                      <p><strong>Service:</strong> <span id="Service"></span></p>
                    </div>
                  </div>
                 </div>
        </div>
                <!-- Add more user data here -->
            </div>
        </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel','print', 'colvis'
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
          timer: 2800
          })
    
    </script>
        
    @endif

    

<script>
        function deleteEmp(id){
            Swal.fire({
                 title: 'Es-tu sûr?',
                 text: "Vous ne pourrez pas revenir en arrière !",
                 icon: 'warning',
                 showCancelButton: false,
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

<script>
       
    $(document).ready(function () {
        
        $('body').on('click', '#show-user', function () {
          var userURL = $(this).data('url');
          $.get(userURL, function (data) {
              $('#userShowModal').modal('show');
              $('#Cin').text(data.Cin);
              $('#Nom').text(data.Nom);
              $('#Prenom').text(data.Prenom);
              $('#Sexe').text(data.Sexe);
              $('#DateNaissance').text(data.DateNaissance);
              $('#LieuNaissance').text(data.LieuNaissance);
              $('#Email').text(data.Email);
              $('#Tel').text(data.Tel);
              $('#Service').text(data.Service);
              
          })
       });
        
    });
   
</script>
    

@endsection