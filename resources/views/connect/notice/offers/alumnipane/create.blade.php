<x-layouts.app>
    <style>
        @media only screen and (max-width: 768px) {
        /* For mobile phones: */
           
        }
        @media only screen and (min-width: 768px) {
        /* For big Screen: */
        #form{
            margin-left: 15em;
            margin-right: 15em;
        }
        }
       
    </style>
    <div class="container">
        <div class="row" style="margin-left: 4em; margin-right: 4em;">
           <div class="d-flex flex-row-reverse" style="padding: 1em; "> 
                <a type="button" class="btn btn-outline-primary" style="margin: 3px" href="/connect/alumni">Alumni</a>
                <a type="button" class="btn btn-outline-primary" style="margin: 3px" href="/connect/professor">Professor</a>
                <a type="button" class="btn btn-outline-primary" style="margin: 3px" href="/connect/student">Student</a>
                <a type="button" class="btn btn-primary text-white" style="margin: 3px" href="/connect">Posts</a>
           </div>
       </div>
       <div class="row">
           <div class="col">
           
            <div class="card" id="form" >
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{$message}}</strong>
                </div>
            @endif
                   <div class="card-header">
                       Create a Offer
                   </div>
                   <div class="card-body">
                    <form method="post" action="/connect/job/store">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Offer Title</label>
                          <input type="text"  value="{{ old('title') }}" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">Give a title for the post</div>
                        </div>
                        <div class="mb-3">
                          <label for="cat" class="form-label">Type of Offer for Student</label>
                          
                          <select class="form-select" name="category" id="cat" aria-label="">
                            <option selected>Open this select menu</option>
                            <option value="internship">Internship</option>
                            <option value="job">Job</option>
                            <option value="project">Project</option>
                          </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label" for="exampleCheck1">Job Description</label>
                            <textarea class="ckeditor form-control "  value="{{ old('description') }}" id="description" name="description" required rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                      </form>
                   </div>
                   <div class="card-footer"></div>
               </div>
           </div>
       </div>
    </div>
    <script src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
         
        CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    </script>
</x-layouts.app>