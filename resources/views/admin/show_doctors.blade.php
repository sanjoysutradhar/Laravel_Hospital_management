
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- main-panel ends -->
            <div class="container-fluid page-body-wrapper">

                <div align="center" style="padding-top: 50px">

                    <table  class="table">
                        <thead class="table-light" >
                            <th >Doctor Name</th>
                            <th >Phone</th>
                            <th >Speciality</th>
                            <th >Room No</th>
                            <th >Image</th>
                            <th >Update</th>
                            <th >Delete</th>
                        </thead>
                
                        
                        @foreach($data as $doctor)
                            <tbody style="color:black;" class="table table-primary">
                                <td >{{$doctor->name}}</td>
                                <td >{{$doctor->phone}}</td>
                                <td >{{$doctor->speciality}}</td>
                                <td >{{$doctor->room}}</td>
                                <td ><img height="300" wedith="300" src="DoctorImage/{{$doctor->image}}"></td>
                              
                                <td ><a href="{{url('update_doctor',$doctor->id)}}" 
                                    class="btn btn-success"
                                    > Update</a>
                                </td>
                                <td  ><a onclick="return confirm('Are you sure to delete this?')" href="{{url('delete_doctor',$doctor->id)}}" 
                                    class="btn btn-danger"
                                    > Delete</a></td>
                            </tbody>
                        @endforeach
                        
                      </table>
                </div>

            </div>
       
      <!-- page-body-wrapper ends -->
    </div>
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>