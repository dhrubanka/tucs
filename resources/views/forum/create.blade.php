<x-layouts.app>
     <!------------------------------------------ posts ---------------------------------------->
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
             <div class="card col-12 offset-md-2 col-md-8">
                 <div class="card-header row" style="padding-top: 25px;">
                     <h5 class="card-title col-12 col-md-8">CREATE A POST</h5>
                     <form class="col-md-4" method="POST" action="/post/store">
                        @csrf
                         <select class="form-select col-md-12" name="community_id"  required >
                             <option value="" selected>CHOOSE A COMMUNITY</option>
                             @foreach ($communities as $item)
                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                             @endforeach
                         </select>

                 </div>
                 <div class="card-body" style="marginn: 20px;">

                         <div class="form-group">
                           <input class="form-control" required type="text" name="title" id="title" class="form-control" placeholder="TITLE">
                         </div>
                         <div class="form-group">
                             <textarea class="form-control" required name="content" id="content" placeholder="CONTENT" rows="3"></textarea>
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn btn-primary">POST</button>
                         </div>
                     </form>
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
