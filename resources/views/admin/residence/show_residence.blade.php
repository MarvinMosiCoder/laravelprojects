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


    <div class="row">
       <div class="col-md-4">
         <form class="cmxform form-horizontal style-form" method="post" action="{{ route('residence.update', $id)}}" enctype="multipart/form-data">{{ csrf_field() }}
           <input type="hidden" name="_method" value="PATCH" />
           <input type="text" name="admin_name" value="{{ Auth::guard('admin')->user()->name }}" style="display: none">   

            <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                    <img src="{{ url('images/residence_images/'.$residences->image) }}" class="img-thumbnail" width="100" />
                    <input type="hidden" name="current_residence_image" value="{{ $residences->image }}" />
                    <input type="text" name="process_type" value="Updated Residence" style="display: none">

            </div>     
       </div>

      <div class="col-md-8">

        <div class="form-group">
          <label for="FirstName" class="control-label">FirstName</label>
          <div class="col-lg-12">
            <input type="text" name="fname" class="form-control" placeholder="Enter Firstname" value="{{ $residences->fname }}" required>
          </div>
         </div>

          <div class="form-group">
            <label for="MiddleName" class="control-label">Middlename</label>
            <div class="col-lg-12">
              <input type="text" name="mname" class="form-control" value="{{ $residences->mname }}" placeholder="Enter Middlename">
            </div>
          </div>

        <div class="form-group">
        <label for="LastName" class="control-label">Lastname</label>
          <div class="col-lg-12">
           <input type="text" name="lname" class="form-control" value="{{ $residences->lname }}" placeholder="Enter Lastname" required>
          </div>
        </div>

        <div class="form-group">           
           <label class="control-label">Birth of Date</label>
            <div class="col-lg-12">                    
              <input type="date" name="date_of_birth" value="{{ $residences->date_of_birth }}" class="form-control">
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
          <select name="gender" value="{{ $residences->gender }}" class="form-control">
            <option <?php if ($residences->gender  == 'Male') echo 'selected'; ?>>Male</option>
            <option <?php if ($residences->gender  == 'Male') echo 'selected'; ?>>Female</option>
          </select>
          </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
          <label for="Cellphone Number">Contact</label>
            <div class="col-lg-12">
            <input type="text" name="contact" class="form-control"  pattern="[0-9]{11}" placeholder="Enter Cellphone Number" value="{{ $residences->contact }}" required/>
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
              <input type="text" name="birthplace" placeholder="Enter Contact" class="form-control" value="{{ $residences->birthplace }}">
          </div>
        </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
            <label for="Cellphone Number" class="control-label col-lg-2">Email</label>
          <div class="col-lg-12">
             <input type="text" name="email" placeholder="Enter Email" class="form-control" value="{{ $residences->email }}">
          </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
            <label for="Cellphone Number" class="control-label col-lg-2">Adress</label>
          <div class="col-lg-12">
             <input type="text" name="address" placeholder="Enter Address" class="form-control" value="{{ $residences->address }}">
          </div>
      </div>
    </div>


     </div>
      </div>
     
        <input type="submit" value="Update Data" class="btn btn-primary">
 </form><!-- endform -->  

  </div><!-- lastRow -->   
  

      </div>
    </div>
  </div>
</div><!-- ---REGISTRATION FORM -->


</div><!-- table container -->
       </div>
     </div>
          
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection