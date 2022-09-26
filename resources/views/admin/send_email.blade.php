
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

                <form method="POST" action="{{url('sendmail',$data->id)}}">
                    @csrf
                    <div class="mb-6">
                        <label
                            class="inline-block text-lg mb-2"
                            >Greeting</label
                        >
                        <input
                            type="text"
                            class=" text-black border border-gray-200 rounded p-2 w-full"
                            name="greeting" required
                        />
                        
    
                    </div>
                    <div class="mb-6">
                        <label
                            class="inline-block text-lg mb-2"
                            >Body</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full text-black"
                            name="body" required/>
                    </div>
                    
                    <div class="mb-6">
                        <label
                            class="inline-block text-lg mb-2"
                            >Action Text</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full text-black"
                            name="actiontext" value="{{old('room')}}" required
                        />
                    </div>
                    
                    <div class="mb-6">
                        <label
                            class="inline-block text-lg mb-2"
                            >Action Url</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full text-black"
                            name="actionurl" required/>
                    </div>
                    <div class="mb-6">
                        <label
                            class="inline-block text-lg mb-2"
                            >End Part</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full text-black"
                            name="endpart" required/>
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