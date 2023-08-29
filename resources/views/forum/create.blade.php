<x-layouts.app>
    <div style="background: f8f9fa; padding: 2em">
        <!------------------------------------------ posts ---------------------------------------->

        <div class="card col-12 offset-md-2 col-md-8" style="">
            <div class="card-header row" style="margin: 0%; background-color: royalblue; color:white  ">
                <h5 class="card-title col-12 p-1">CREATE A POST</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="/post/store">
                    @csrf
                    <div class="mb-3">
                        @if(count($communities) > 0)
                        <select class="form-select col-md-6" name="community_id" id="community" required>
                            <option value="" selected>CHOOSE A COMMUNITY</option>
                            @foreach ($communities as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @else
                        <p>You haven't subscribed to any communities yet. <a href="{{ route('forum.explore') }}">Explore communities</a> to find the right one for your post.</p>
                        @endif
                    </div>
                    <div id="additionalFields" style="display: none;">
                        <div class="mb-3">
                            <input class="form-control" required type="text" name="title" id="title"
                                class="form-control" placeholder="TITLE">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" required name="content" id="content" placeholder="CONTENT" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn "
                                style=" background-color: royalblue; color:white ">POST</button>
                        </div>
                    </div>
               
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if ($message = Session::get('success'))
                    <x-successbadge />

                    <div class="alert alert-success d-flex align-items-center" role="alert" style="margin:10px">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                            aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            {{ $message }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{ route('ckeditor.image-upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        const communitySelect = document.getElementById('community');
        const additionalFields = document.getElementById('additionalFields');

        communitySelect.addEventListener('change', function() {
            if (communitySelect.value) {
                additionalFields.style.display = 'block';
            } else {
                additionalFields.style.display = 'none';
            }
    });
    </script>
</x-layouts.app>
