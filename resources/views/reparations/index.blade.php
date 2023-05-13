@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
    Page | Reparation
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

            <div class="col-md-8 mt-4">
                <div class="small-box" style="background-color: rgb(240, 189, 24)">
                 <div class="inner">
                     <h3>{{ \App\Models\Reparation::count() }}</h3>
                     <p class="text-bold">Reaparation</p>
                 </div>
                 <div class="icon">
                     <i class="fas fa-wrench"></i>
                 </div>
                 <a href="{{ url('admin/reparations') }}" class="small-box-footer">
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
                    <div class="text-center font-weight-bold ">
     
                       <h4 class="btn btn-info">Reparation</h4>
     
     
                     </div>
                   </div>
                  <div class="card-body">
                    <div class="table-responsive-md col-md-12">
                        <table id="myTable" class="table table-bordered table-hover table-striped  table-responsive-md">
                            <thead style="background-color: rgb(74, 74, 117); color:aliceblue">
                               <tr>
                                   <th>ID</th>
                                   <th>Numéro Reparation</th>
                                   <th>Date Reparation</th>
                                   <th>Type Reparation</th>
                                   <th>Prix Reparation</th>
                                   <th>Matricule</th>
                                   <th>Action</th>
                                   
                           
                                   
                               </tr>
                            </thead>
                            <tbody>
                               @foreach ($reparations as $key => $reparation)
                               <tr>
                                   <td>{{ $key+=1 }}</td>
                                   <td>{{ $reparation->Numero_reparation }}</td>
                                   <td>{{ $reparation->Date_reparation }}</td>
                                   <td>{{ $reparation->Type_reparation }}</td>
                                   <td>{{ $reparation->Prix_reparation }} <strong>Dhs</strong></td>
                                   <td>{{ $reparation->vehicule->Matricule }}</td>
                                   <td class="d-flex justify-content-center align-items-center">
                                      
                                    <a href="javascript:void(0)"
                                    id="show-user"
                                    data-url="{{ route('reparations.show', $reparation->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                    </a>
                                       
                                       <a href="{{ route('reparations.edit' , $reparation->id) }}" 
                                          class="btn btn-sm btn-warning mx-2">
                                          <i class="fas fa-edit"></i>
                                       </a>
                                       <form  id="{{ $reparation->id }}" action="{{ route('reparations.destroy' , $reparation->id) }}" method="post">
                           
                                           @csrf
                                           @method('DELETE')
                                       </form>
                                           <button  onclick="deleteEmp({{ $reparation->id }})"
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


<!-- Modal -->
<div class="modal fade" id="userShowModal" tabindex="-1" role="dialog" aria-labelledby="userShowModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="userShowModal" style="font-weight: bold">Détails de reparation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card  mb-3" style="max-width: 30rem; background-color:rgb(52, 201, 221)">
                    <div class="card-header">Reparation</div>
                    <div class="card-body">
                      {{-- <h5 class="card-title">détails de carburant</h5><br> --}}
                      <p><strong>Némuro reparation:</strong> <span id="Numero_reparation"></span></p>
                      <p><strong>Date reparation:</strong> <span id="Date_reparation"></span></p>
                      <p><strong>Type reparation:</strong> <span id="Type_reparation"></span></p>
                      <p><strong>Prix reparation:</strong> <span id="Prix_reparation"></span> <strong>Dhs</strong></p>
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
                 'excel','print', 'colvis'
                ]
            });
        });
    </script>
    @if (session()->has('success'))
    <script>
          
          Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: "{{ session()->get('success') }}",
          showConfirmButton: false,
          timer: 2000
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
              $('#Numero_reparation').text(data.Numero_reparation);
              $('#Date_reparation').text(data.Date_reparation);
              $('#Type_reparation').text(data.Type_reparation);
              $('#Prix_reparation').text(data.Prix_reparation);
              $('#vehicule_id').text(data.vehicule_id);
              
          })
       });
        
    });
   
</script>
    

@endsection