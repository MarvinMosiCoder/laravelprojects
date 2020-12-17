 @extends('layouts.admin_layouts.admin_design')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Blotter Record</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Blotter</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Blotter Records
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Blotter Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="row">
       <div class="col-md-6">
         <form class="cmxform form-horizontal style-form" method="post" action="{{ route('blotter.store') }}">{{ csrf_field() }}

          <input type="text" name="admin_name" value="{{ Auth::guard('admin')->user()->name }}" style="display: none">   
           <input type="text" name="process_type" value="Add Blotter Record" style="display: none">
      
       <div class="form-group">
      <label for="FirstName" class="control-label col-lg-12">Name OF Complainant</label>
      <div class="col-lg-12">
        <input type="text" name="comp_name" class="form-control"  placeholder="Enter Fullname"/>
        
      </div>
      </div>

      <div class="form-group">
        <label for="Age" class="control-label col-lg-12">Age</label>
        <div class="col-lg-12">
        <input type="text" name="comp_age" class="form-control" placeholder="Enter AGe">
      </div>
      </div>
       <div class="form-group">
        <div class="col-lg-12">
      <label for="Gender" class="control-label">Gender</label>
      <select class="btn btn-default" name="comp_gender" required/>  
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      </div>
    <div class="form-group">
        <label for="NAT" class="control-label col-lg-12">NAT</label>
        <div class="col-lg-12">
        <input type="text" name="comp_nat" class="form-control" placeholder="Enter Nat" required/>
      </div>
    </div>

    <div class="form-group">
        <label for="Address" class="control-label col-lg-12">Address</label>
        <div class="col-lg-12">
        <textarea name="comp_address" class="form-control" placeholder="Enter Address" required/></textarea>
      </div>
    </div>

  </div>

    <div class="col-md-6">
      <h3>Respondent</h3>
      <div class="form-group">
      <label for="" class="control-label col-lg-12">Respondent Reg_Entry</label>
      <div class="col-lg-12">
        <input type="text" name="residences_id" id="selectuser_id" class="form-control"  />
      </div>
      </div>
    <div class="form-group">
      <label for="autocomplete" class="control-label col-lg-12">Name OF Respondent</label>
      <div class="col-lg-12">
        <input type="text" name="resp_name" id="autocomplete" class="form-control input-lg" >
      </div>
      </div>

    <div class="form-group">
      <label for="" class="control-label col-lg-12">Age</label>
        <div class="col-lg-12">
        <input type="text" name="resp_age" class="form-control" placeholder="Enter Age">
      </div>
      </div>
       <div class="form-group">
        <div class="col-lg-12">
      <label for="Gender" class="control-label">Gender</label>
      <select class="btn btn-default" name="resp_gender">  
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      </div>
       <div class="form-group">
      <label for="" class="control-label col-lg-12">NAT</label>
        <div class="col-lg-12">
        <input type="text" name="resp_nat" class="form-control" placeholder="Enter Nat">
      </div>
      </div>
      <div class="form-group">
        <label for="Address" class="control-label col-lg-12">Address</label>
        <div class="col-lg-12">
        <textarea name="resp_address" class="form-control" placeholder="Enter Address"></textarea>
      </div>
    </div>

      
  
    </div>
  </div>
    </div><!--first col-->

    <hr>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
      <label for="" class="control-label col-lg-12">Serial Number</label>
        <div class="col-lg-12">
        <input type="text" name="serial_number" class="form-control" placeholder="Enter Serial Number" required/>
      </div>
      </div>
      
</div>
      <div class="col-md-6">
      <div class="form-group">
        <label for="" class="control-label col-lg-12">Blotter Type</label>
        <div class="col-lg-12">
        <input type="text" name="blotter_type" class="form-control" placeholder="Enter blotter type">
      </div>
      </div>
      <div class="form-group">
        <label for="" class="control-label col-lg-12">Location</label>
        <div class="col-lg-12">
        <input type="text" name="location" class="form-control" placeholder="Enter location">
      </div>
      </div>
      
  
 </div>
</div><!--first col-->
    <hr>
<div class="row">
    <div class="col-md-12">
      <div class="form-group">
      <label for="Cellphone Number" class="control-label col-lg-12">Complainant Statement</label>
        <div class="col-lg-12">
        <textarea class="form-control" name="comp_statement" placeholder="Enter Statement" required/></textarea>
      </div>
      </div>
    </div>     
      
</div>

<hr>
<hr>
<div class="row">
    <div class="col-md-12">
      <div class="form-group">
      <label for="Cellphone Number" class="control-label col-lg-12">Respondent Statement</label>
        <div class="col-lg-12">
        <textarea class="form-control" name="resp_statement" placeholder="Enter Statement" required/></textarea>
      </div>
      </div>
    </div>      
      
</div>

<hr>
        
        <div class="form-group">
          <div class="container">
           <button type="submit" name="saveBlotter" class="btn btn-primary" value="Save"> <i class="fa fa-save"></i> Save Blotter Records</button>
          </div>
        </div>
          
    </form>   
    </div>  
    </div><!-- lastRow -->   
  

      </div>
    </div>
  </div>
</div>

<!-- VIEW TABLE -->
<div class="container">
<table class="table table-bordered">
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

    </tr>
  </thead>
  <tbody> 
     @foreach($blotters as $blotter)
      <tr>
        <td> 
          <a class="btn btn-primary"  href=""><i class="fa fa-eye"></i></a>
        </td>
        <td>
          <a class="btn btn-warning" href=""><i class="fa fa-edit text-white"></i></a>
        </td>
        <td></td>
        <td>
          <img src="" width="40" height="40">
        </td>
        <td>{{ $blotter->comp_name }}</td>
        <td>{{ $blotter->resp_name }}</td>
        <td>{{ $blotter->blotter_type }}</td>
       
      </tr>
     @endforeach
  </tbody>
</table>
</div><!-- table container -->
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

 <script>

 </script>   
      
    

  
