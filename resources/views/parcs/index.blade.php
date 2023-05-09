@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
    Page | Parc
@endsection

@section('content')
<div class="container ">
    <div class="row ">
        
            <div class="col-md-4 mt-4">
                <div class="small-box" style="background-color: rgb(107, 221, 215)">
                 <div class="inner">
                     <h3>{{ \App\Models\Vehicule::count() }}</h3>
                     <p>Vehicule</p>
                 </div>
                 <div class="icon">
                     <i class="fas fa-car"></i>
                 </div>
                 <a href="{{ url('admin/vehicules') }}" class="small-box-footer">
                 more info <i class="fas fa-arrow-circle-right"></i>
                 </a>
                </div>
            </div>

            <div class="col-md-8 mt-4">
                <div class="small-box" style="background-color: rgb(243, 24, 214)">
                 <div class="inner">
                     <h3>{{ \App\Models\Parc::count() }}</h3>
                     <p>Parking</p>
                 </div>
                 <div class="icon">
                     <i class="fas fa-university"></i>
                 </div>
                 <a href="{{ url('admin/parcs') }}" class="small-box-footer">
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
                <div class="card">
                    <div class="card-header">
                        <div class="text-center font-weight-bold ">
         
                           <h4 class="btn btn-info">Parking</h4>
         
         
                         </div>
                       </div>
                      <div class="card-body">
                          <div class="col-lg-12">
                            <table id="myTable" class="table table-bordered table-striped  table-responsive-md table-hover">
                                <thead style="background-color: rgb(74, 74, 117); color:aliceblue">
                                   <tr>
                                       <th>ID</th>
                                       <th>Numero parc</th>
                                       <th>Nom parc</th>
                                       <th>Action</th>
                                       
                               
                                       
                                   </tr>
                                </thead>
                                <tbody>
                                   @foreach ($parcs as $key =>  $parc)
                                   <tr>
                                       <td>{{ $key+=1 }}</td>
                                       <td>{{ $parc->Numero_parc }}</td>
                                       <td>{{ $parc->Nom_parc }}</td>
                                       <td class="d-flex justify-content-center align-items-center">
                                          
                                           <a href="javascript:void(0)"
                                              id="show-user"
                                              data-url="{{ route('parcs.show', $parc->id) }}"
                                              class="btn btn-sm btn-success">
                                              <i class="fas fa-eye"></i>
                                           </a>
                                           
                                           <a href="{{ route('parcs.edit' , $parc->id) }}" 
                                              class="btn btn-sm btn-warning mx-2">
                                              <i class="fas fa-edit"></i>
                                           </a>
                                           <form  id="{{ $parc->id }}" action="{{ route('parcs.destroy' , $parc->id) }}" method="post">
                               
                                               @csrf
                                               @method('DELETE')
                                           </form>
                                               <button  onclick="deleteEmp({{ $parc->id }})"
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
                <h5 class="modal-title text-danger" id="userShowModal">Parking Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{ asset('img/jj.png') }}" class="img-fluid rounded-start" alt="..." style="height: 100%; width:300px">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          {{-- <h5 class="card-title">Card title</h5><br> --}}
                          <form>
                    <div class="">
                       <div class="form-group mb-3">
                        <label for="numero_parc" class="form-label text-success">Numéro Parking</label>
                        <ul>
                            <li><span id="parc-id"></span></p></li>
                        </ul>
                       </div>
                    </div>
                    <div class="">
                        <div class="form-group mb-3">
                            <label for="nom_parc" class="form-label text-success">Nom Parking</label>
                           <ul>
                              <li> <span id="parc-nom"></span></p></li>
                           </ul>
                        </div>
                    </div>
                  </form>
                         
                         
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Add more user data here -->
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
                    'excel', 'print', 'colvis'
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
              $('#parc-id').text(data.Numero_parc);
              $('#parc-nom').text(data.Nom_parc);
              
          })
       });
        
    });
   
</script>
    

@endsection