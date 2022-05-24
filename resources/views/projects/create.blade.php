<x-layouts.app>
<div class="text-center" style="background-color: royalblue; margin-top:-2em; ">
 <div style="padding: 5em; color: white;">
    <div style="border:solid; border-radius: 10px; display: inline; padding:5px;"> Submit your Project &nbsp > &nbsp Wait for Approval &nbsp > &nbsp Moderator reviews Submission &nbsp > &nbsp Acceptance</div>
 </div>
</div>
    <div class="row">
        <div class="container">
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
        </div>
        <div class=" col-12 offset-md-2 col-md-8" style="padding: 2% 3%;">
             
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title col-12 col-md-8">Submit a Project</h5> 
                        
                    </div>
                    <div class="card-body">
                      <form action="/project/store" method="post" enctype="multipart/form-data">
                      @csrf 
                      <div class="mb-3">
                            <label for="title" class="form-label">Project Title <span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="title" value="{{ old('title') }}" required name="title" placeholder="Give your project a title">
                            </div>
                           
                            <div class="mb-3">
                                <label for="domain" class="form-label">Project Domain <span style="color: red">*</span></label>
                                <select class="form-select" aria-label="Select Project Domain" required name="domain">
                                    <option selected>Select Project Domain</option>
                                    <option value="AI">Artificial Intelligence</option>
                                    <option value="WEB">Web Development</option>
                                    <option value="COMPUTER_NETWORKS">Computer Networks</option>
                                    <option value="MOBILE">Mobile Development</option>
                                    <option value="OTHERS">Others</option>
                                </select>
                            </div>
                             
                            <div class="mb-3">
                            <label for="description" class="form-label">Project Description <span style="color: red">*</span></label>
                            <textarea class="ckeditor form-control " value="{{ old('description') }}" id="description" name="description" required rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">Project Link</label>
                                <input type="text" class="form-control" value="{{ old('url') }}" id="url" name="url" placeholder="Can be a Github link or any repository!">
                                </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Select Project Zip</label>
                                <input class="form-control" type="file" id="formFile" name="project_source_zip">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Project Permissions <span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="permission" id="flexRadioDefault1" value="public">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Public
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="permission" id="flexRadioDefault2" value="private" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      Private
                                    </label>
                                  </div>
                                  <br>
                                  Marked <span style="color: red">*</span> are mandatory fields <br>
                                 <b>(Link your project repo url or upload your project zip file)</b>
                            </div>
                   
                    </div>
                    <div class="card-footer text-center">
                    <button type="submit"class="btn btn-secondary" href="#">Submit Project</button>
                    </div>
                    </form>
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