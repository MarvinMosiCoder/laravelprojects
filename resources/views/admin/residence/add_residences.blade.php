 @extends('layouts.admin_layouts.admin_design')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Residence Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Residences</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     <div class="card card-default">
      <div class="card-header">Residences Information</div>
       <div class="card-body">
         <!-- Button trigger modal -->
       @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissable fade show" role="alert">
                {{ Session::get('error_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissable fade show" role="alert">
                {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-plus-circle"></i> Add Residence
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="row">
       <div class="col-md-4">
         <form class="cmxform form-horizontal style-form" method="post" action="{{ route('residence.store')}}" enctype="multipart/form-data">{{ csrf_field() }}
           <input type="text" name="admin_name" value="{{ Auth::guard('admin')->user()->name }}" style="display: none">   
           <input type="text" name="process_type" value="Add Residence" style="display: none">
            <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                  </div>     
       </div>

      <div class="col-md-8">

        <div class="form-group">
          <label for="FirstName" class="control-label">FirstName</label>
          <div class="col-lg-12">
            <input type="text" name="fname" class="form-control" placeholder="Enter Firstname" required>
          </div>
         </div>

          <div class="form-group">
            <label for="MiddleName" class="control-label">Middlename</label>
            <div class="col-lg-12">
              <input type="text" name="mname" class="form-control" placeholder="Enter Middlename">
            </div>
          </div>

        <div class="form-group">
        <label for="LastName" class="control-label">Lastname</label>
          <div class="col-lg-12">
           <input type="text" name="lname" class="form-control"  placeholder="Enter Lastname" required>
          </div>
        </div>

        <div class="form-group">           
           <label class="control-label">Birth of Date</label>
            <div class="col-lg-12">                    
              <input type="date" name="date_of_birth" class="form-control">
          </div>
        </div>
  
      </div><!-- col-8 -->
   </div><!-- endfirst Row -->
<hr>
  <div class="row">

    <div class="col-lg-3">
     <div class="form-group">
          <label for="Cellphone Number" class="control-label">Gender</label>
            <div class="col-lg-12">           
          <select name="gender" class="form-control">
            <option>Male</option>
            <option>Female</option>
          </select>
          </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
          <label for="Cellphone Number">Contact</label>
            <div class="col-lg-12">
            <input type="text" name="contact" class="form-control"  pattern="[0-9]{11}" placeholder="Enter Cellphone Number" required/>
          </div>
        </div>
    </div>
    <div class="col-lg-3">
         <div class="form-group">           
          <label class="control-label">Voter's Status</label>
            <div class="col-lg-12"> 
             <select name="voters_status" class="form-control">
                <option>YES</option>
                <option>NO</option>
             </select>
            </div>
         </div>
    </div>
    <div class="col-lg-3">
         <div class="form-group">           
          <label class="control-label">Voter's Status</label>
            <div class="col-lg-12">
             <select name="civil_status" class="form-control">
                <option>Single</option>
                <option>Married</option>
             </select>
            </div>
         </div>
    </div>     
      
  </div><!-- end2nd row -->
<hr>
  <div class="row">
    <div class="col-lg-12">
       <div class="form-group">           
          <label class="control-label">Area</label>
            <div class="col-lg-12">
             <select name="area" class="form-control">
                <option>Kapitbahayan</option>
                <option>Phase 1A</option>
                <option>Phase 1B</option>
                <option>Phase 1C</option>
             </select>
            </div>
         </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">           
           <label class="control-label">BirthPlace</label>
            <div class="col-lg-12"> 
              <input type="text" name="birthplace" placeholder="Enter Contact" class="form-control">
          </div>
        </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
            <label for="Cellphone Number" class="control-label col-lg-2">Email</label>
          <div class="col-lg-12">
             <input type="text" name="email" placeholder="Enter Email" class="form-control">
          </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
            <label for="Cellphone Number" class="control-label col-lg-2">Adress</label>
          <div class="col-lg-12">
             <input type="text" name="address" placeholder="Enter Address" class="form-control">
          </div>
      </div>
    </div>


     </div>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Save Data" class="btn btn-primary">
 </form><!-- endform -->  

  </div><!-- lastRow -->   
  

      </div>
    </div>
  </div>
</div><!-- ---REGISTRATION FORM -->

<!-- VIEW TABLE -->
<div class="container">
<table class="table table-bordered" id="residence_table">
  <thead>
    <tr>
      <th>View</th>
      <th>Edit</th>
      <th>ID</th>
      <th>Image</th>
      <th>FirstName</th>
      <th>MiddleName</th>
      <th>LastName</th>
      <th>AGE</th>
      <th>ADDRESS</th>
      <th>BIRTHDAY</th>
      <th>CONTACT</th>
      <th>REGISTER VOTERS</th>
      <th>CIVIL STATUS</th>
      <th>CASES</th>

    </tr>
  </thead>
  <tbody> 
      @foreach($residences as $residence)
      <tr>
        <td> 
          <a class="btn btn-primary"  href=""><i class="fa fa-eye"></i></a>
        </td>
        <td>
          <a class="btn btn-warning" href="{{ route('residence.edit', $residence->id) }}"><i class="fa fa-edit text-white"></i></a>
        </td>
        <td>{{ $residence->id }}</td>
        <td>
          <img src="{{ url('images/residence_images/'.$residence->image) }}" width="40" height="40">
        </td>
        <td>{{ $residence->fname }}</td>
        <td>{{ $residence->mname }}</td>
        <td>{{ $residence->lname }}</td>
        <td>{{ intval(date("Y"))-intval(substr
              ($residence->date_of_birth , 0,4)) }}</td>
        <td>{{ $residence->address }}</td>  
        <td>{{ $residence->date_of_birth }}</td> 
        <td>{{ $residence->contact }}</td>
        <td>{{ $residence->voters_status }}</td>
        <td>{{ $residence->civil_status }}</td>
        @foreach($residence->blotter as $cases)
        <td>{{ $cases->blotter_type }}</td>
        @endforeach
      </tr>
      @endforeach
  </tbody>
</table>
</div><!-- table container -->
       </div>
     </div>
          
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @yield('js')
  <script>
    $(document).ready(function(){
     var table = $('#residence_table').DataTable();
    });  
  </script>
  
 