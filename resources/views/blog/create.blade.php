<x-layouts.app>
    <div class="p-4"  style="  background: rgb(192,174,238);
    background: linear-gradient(90deg, rgba(192,174,238,1) 26%, rgba(148,187,233,1) 100%);">
    <!------------------------------------------ posts ---------------------------------------->
        <div class="row">
           @if ($message = Session::get('success'))
           <div class="alert alert-success alert-block">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>{{ $message }}</strong>
           </div>
       @endif
            <div class="card col-12 offset-md-2 col-md-8" style=" background-color: rgba(255,255,255, 0.2) !important;" >
                <div class="card-header row" style="padding-top: 25px ;  color:white;background-color: royalblue">
                    <h5 class="card-title col-12 col-md-8">CREATE A POST</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="/blog/store">
                        @csrf 
                        <div class="form-group" style="padding: 10px;">
                          <input class="form-control" type="text" name="title" id="title" class="form-control" placeholder="Give a Title">
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <textarea class="form-control" name="content" id="content" placeholder="CONTENT" rows="3"></textarea>
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <button type="submit" class="btn " style="color:white;background-color: royalblue">POST</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace('content', {
    filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>
</x-layouts.forum-nav>
