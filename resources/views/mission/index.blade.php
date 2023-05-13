@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
    Page | Mission
@endsection


@section('content')
<div class="container ">
    <div class="row ">
        <div class="col-md-4 mt-4">
            <div class="small-box" style="background-color: rgb(64, 233, 115)">
             <div class="inner">
                 <h3>{{ \App\Models\Vehicule::count() }}</h3>
                 <p class="text-bold">Vehicule</p>
             </div>
             <div class="icon">
                 <i class="fas fa-truck"></i>
             </div>
             <a href="{{ url('admin/vehicules') }}" class="small-box-footer">
             more info <i class="fas fa-arrow-circle-right"></i>
             </a>
            </div>
        </div>

        <div class="col-md-4 mt-4">
            <div class="small-box" style="background-color: rgb(46, 104, 230)">
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

        <div class="col-md-4 mt-4">
            <div class="small-box" style="background-color: rgb(226, 40, 180)">
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
          {{-- <div class="row my-5">
               <div class="col-md-6 mx-auto">
                @include('layouts.alert')
               </div>
          </div> --}}
           <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header">
                    <div class="card-header">
                        <div class="text-center font-weight-bold ">
         
                           <h4 class="btn btn-info">Mission</h4>
         
         
                         </div>
                       </div>
                  <div class="card-body">
                      <div class="col-lg-12">
                        <table id="myTable" class="table table-bordered table-striped  table-responsive-md table-hover">
                            <thead style="background-color: rgb(74, 74, 117); color:aliceblue">
                               <tr>
                                   <th>ID</th>
                                   <th>Code Mission</th>
                                   <th>Ville</th>
                                   <th>Lieu</th>
                                   <th>Object</th>
                                   <th>Fonctionnaire</th>
                                   <th>Matricule</th>
                                   <th>Date Depart</th>
                                   <th>Date Retour</th>
                                   <th>Action</th>
                                   
                           
                                   
                               </tr>
                            </thead>
                            <tbody>
                               @foreach ($missions as $key => $mission)
                               <tr>
                                   <td>{{ $key+=1 }}</td>
                                   <td>{{ $mission->CodeMission }}</td>
                                   <td>{{ $mission->Ville }}</td>
                                   <td>{{ $mission->Lieu }}</td>
                                   <td>{{ $mission->Object }}</td>
                                   <td>{{ $mission->fonctionnaire->Nom }}</td>
                                   <td>{{ $mission->vehicule->Matricule }}</td>
                                   <td>{{ $mission->DateDepart }}</td>
                                   <td>{{ $mission->DateRetour }}</td>
                                   <td class="d-flex justify-content-center align-items-center">
                                      
                                    <a href="javascript:void(0)"
                                    id="show-user"
                                    data-url="{{ route('missions.show', $mission->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                    </a>
                                       
                                       <a href="{{ route('missions.edit' , $mission->id) }}" 
                                          class="btn btn-sm btn-success mx-2">
                                          <i class="fas fa-edit"></i>
                                       </a>
                                       <form  id="{{ $mission->id }}" action="{{ route('missions.destroy' , $mission->id) }}" method="post">
                           
                                           @csrf
                                           @method('DELETE')
                                       </form>
                                           <button  onclick="deleteEmp({{ $mission->id}})"
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
                <h5 class="modal-title text-dark" id="userShowModal" style="font-weight: bold">Détails de mission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3" style="max-width: 30rem; background-color:rgb(207, 65, 200)">
                    <div class="card-header text-bold">Mission</div>
                    <div class="card-body">
                      {{-- <h5 class="card-title">détails de carburant</h5><br> --}}
                      <p><strong>CodeMission:</strong> <span id="CodeMission"></span></p>
                      <p><strong>Ville:</strong> <span id="Ville"></span></p>
                      <p><strong>Lieu:</strong> <span id="Lieu"></span></p>
                      <p><strong>Object:</strong> <span id="Object"></span></p>
                      <p><strong>Date Depart:</strong> <span id="DateDepart"></span></p>
                      <p><strong>Lieu Retour:</strong> <span id="DateRetour"></span></p>
                      <p><strong>ID_fonctionnaire:</strong> <span id="fonctionnaire_id"></span></p>
                      <p><strong>ID_vehicule:</strong> <span id="vehicule_id"></span></p>
                      
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
                    'excel', 'print', 'colvis'
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
          timer: 3000
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
    

    <script>
       
        $(document).ready(function () {
            
            $('body').on('click', '#show-user', function () {
              var userURL = $(this).data('url');
              $.get(userURL, function (data) {
                  $('#userShowModal').modal('show');
                  $('#CodeMission').text(data.CodeMission);
                  $('#Ville').text(data.Ville);
                  $('#Lieu').text(data.Lieu);
                  $('#Object').text(data.Object);
                  $('#DateDepart').text(data.DateDepart);
                  $('#DtaeRetour').text(data.DateRetour);
                  $('#fonctionnaire_id').text(data.fonctionnaire_id);
                  $('#vehicule_id').text(data.vehicule_id);
                  $('#Service').text(data.Service);
                  
              })
           });
            
        });
       
    </script>

@endsection