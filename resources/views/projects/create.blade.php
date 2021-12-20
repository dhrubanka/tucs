<x-layouts.app>
<div class="text-center" style="background-color: royalblue; margin-top:-2em; ">
 <div style="padding: 5em; color: white;">
    <div style="border:solid; border-radius: 10px; display: inline; padding:5px;"> Submit your Project &nbsp > &nbsp Waits for Approval &nbsp > &nbsp Moderator reviews Submission &nbsp > &nbsp Acception</div>
 </div>
</div>
    <div class="row">
        <div class="container">
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
                      <form action="/project/store" method="post">
                      @csrf 
                      <div class="mb-3">
                            <label for="title" class="form-label">Project Title</label>
                            <input type="text" class="form-control" id="title" required name="title" placeholder="Give your project a title">
                            </div>
                            <div class="mb-3">
                            <label for="url" class="form-label">Project Title</label>
                            <input type="text" class="form-control" id="url" required name="url" placeholder="Paste Github link">
                            </div>
                            <div class="mb-3">
                            <label for="domain" class="form-label">Project Domain</label>
                            <input type="text" class="form-control" id="domain" required name="domain" placeholder="Give domain of the project, example Android Development">
                            </div>
                            <div class="mb-3">
                            <div class="mb-3">
                            <label for="description" class="form-label">Project Description</label>
                            <textarea class="form-control" id="description" name="description" required rows="3"></textarea>
                            </div>
                   
                    </div>
                    <div class="card-footer">
                    <button type="submit"class="btn btn-primary" href="#">Submit Project</button>
                    </div>
                    </form>
                </div>
             
        </div>
    </div>

</x-layouts.app>