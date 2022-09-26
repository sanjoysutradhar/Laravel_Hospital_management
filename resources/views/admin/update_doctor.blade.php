
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
            
            <div class="container" style="padding-top: 50px">

                @if(session()->has('message'))

            <div class="alert alert-success alert-dismissible fade show " role="alert">
                
                <button type="button" 
                class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>

                </button>
                {{session()->get('message')}}
            </div>

            @endif

                <form method="POST" action="{{url('edit_doctor',$data->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label
                            for="name"
                            class="inline-block text-lg mb-2"
                            >Doctor Name</label
                        >
                        <input
                            type="text"
                            class=" text-black border border-gray-200 rounded p-2 w-full"
                            name="name" value="{{$data->name}}" 
                        />
    
                    </div>
                    <div class="mb-6">
                        <label
                            for="phone"
                            class="inline-block text-lg mb-2"
                            >Doctor phone number</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full text-black"
                            name="phone" value="{{$data->phone}}" 
                        />
    
                    </div>
                    <div class="mb-6">
                        <label
                            for="speciality"
                            class="inline-block text-lg mb-2"
                            >Doctor speciality </label>
                        <select name="speciality" id=""
                        class="border border-gray-200 rounded p-2 w-full"
                        style="color: black; width: 300px;" >
                            <option value="{{$data->speciality}}">{{$data->speciality}}</option>
                            <option value="skin">skin</option>
                            <option value="heart">heart</option>
                            <option value="eye">eye</option>
                            <option value="nose">nose</option>
                    </select>
    
                    </div>
                    <div class="mb-6">
                        <label
                            for="room"
                            class="inline-block text-lg mb-2"
                            >Room number</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full text-black"
                            name="room" value="{{$data->room}}" 
                        />
    
                    </div>
                    <div class="mb-6">
                        <label for="file" class="inline-block text-lg mb-2">
                            Doctor image
                        </label>
                        <input
                            type="file"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="file" 
                        />
                        <img
                            class="w-48 mr-6 mb-6"
                            src="DoctorImage/{{$data->image}}"
                            alt=""
                        />
                    </div>
                    <div class="mb-6">
                        <input type="submit" class="btn btn-success"/>
                    </div>
                </form>

            </div>
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>