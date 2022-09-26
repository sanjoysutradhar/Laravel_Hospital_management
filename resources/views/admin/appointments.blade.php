
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
      
            <div align="center" style="width: 1000px; padding-top:100px; 
             position: absolute; overflow-x: scroll; overflow-y: visible;
          ">
                <table  class="table" style="" >
                    <thead class="table-light" >
                        <th >Applicant Name</th>
                        <th >Phone</th>
                        <th >Email</th>
                        <th >Date</th>
                        <th >Message</th>
                        <th >Status</th>
                        <th >Approved</th>
                        <th >Cancel</th>
                    </thead>
            
                    
                    @foreach($appoint as $appoints)
                        <tbody style="color:black;" class="table table-primary">
                            <td >{{$appoints->name}}</td>
                            <td >{{$appoints->phone}}</td>
                            <td >{{$appoints->email}}</td>
                            <td >{{$appoints->date}}</td>
                            <td >{{$appoints->message}}</td>
                            <td >{{$appoints->status}}</td>
                            <td ><a href="{{url('approved',$appoints->id)}}" 
                                class="btn btn-success"
                                > Approved</a>
                            </td>
                            <td  ><a href="{{url('canceled',$appoints->id)}}" 
                                class="btn btn-danger"
                                > Cancel</a></td>
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