<x-layouts.app>
    <div class="p-4"  style="  background: #f8f9fa">
    <!------------------------------------------ posts ---------------------------------------->
        <div class="row">
           @if ($message = Session::get('success'))
           <div class="alert alert-danger alert-block">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>{{ $message }}</strong>
           </div>
           @endif
            <div class="card col-12 offset-md-2 col-md-8" style=" background-color: rgba(255,255,255, 0.2) !important;" >
                <div class="card-header row" style="padding-top: 25px ;  color:white;background-color: royalblue">
                    <h5 class="card-title col-12 col-md-8">UPDATE POST</h5>
                </div>
                @Auth
                @if ($blog->profile_id == Auth::user()->profile->id)
                <div class="card-body">
                    <form method="POST" action="/blog/{{$blog->id}}/update">
                        @csrf 
                        <div class="form-group" style="padding: 10px;">
                          <input class="form-control" type="text" name="title" id="title" class="form-control" value="{{$blog->title}}" placeholder="Give a Title">
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <textarea class="form-control" name="content" id="content" placeholder="CONTENT" rows="3">{{$blog->content}}</textarea>
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <button type="submit" class="btn " style="color:white;background-color: royalblue">UPDATE</button>
                        </div>
                    </form>
                </div>
                @else
                <div class="card-body">
                    <h2>
                        You cannot edit post of other users
                    </h2>
                </div>
                @endif
                @endAuth
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

