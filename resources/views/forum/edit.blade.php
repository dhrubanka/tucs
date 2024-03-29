<x-layouts.app>
    <div style="background: f8f9fa;  padding: 2em">
     <!------------------------------------------ posts ---------------------------------------->
    
             <div class="card col-12 offset-md-2 col-md-8">
                <div class="card-header row" style="margin: 0%; background-color: royalblue; color:white  ">
                     <h5 class="card-title col-12 col-md-8 p-1">UPDATE POST</h5>
                     @Auth
                     @if ($post->profile_id == Auth::user()->profile->id)     
                     <form method="POST" action="/post/{{$post->id}}/update">
                        @csrf
                </div>
                <div class="card-body" >
                        <div class="mb-3">
                           <input class="form-control" required type="text" name="title" id="title" class="form-control" value="{{$post->title}}" placeholder="TITLE">
                        </div>
                        <div class="mb-3">
                             <textarea class="form-control" required name="content" id="content" placeholder="CONTENT" rows="3">{{$post->content}}</textarea>
                        </div>
                        <div class="mb-3">
                             <button type="submit" class="btn " style=" background-color: royalblue; color:white ">POST</button>
                        </div>
                </form>
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

             <div class="row">
                <div class="col-md-8 offset-md-2">
                    @if ($message = Session::get('success'))
                     <x-successbadge/>
    
                    <div class="alert alert-success d-flex align-items-center" role="alert" style="margin:10px">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                      <div>
                        {{$message}}
                      </div>
                    </div>
                @endif
                </div>
         </div>
        </div>
<script src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
</script>
</x-layouts.app>
