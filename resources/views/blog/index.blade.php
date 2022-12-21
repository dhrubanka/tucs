<x-layouts.app>
<style>
.post{
    color: black;
}
</style>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap");

 

/* img {
  max-width: 100%;
  display: block;
  object-fit: cover;
} */

.card4 {
  display: flex;
  flex-direction: column;
  width: clamp(20rem, calc(20rem + 2vw), 22rem);
  overflow: hidden;
  box-shadow: 0 .1rem 1rem rgba(0, 0, 0, 0.1);
  border-radius: 1em;
  background: #ECE9E6;
background: linear-gradient(to right, #FFFFFF, #ECE9E6);
margin: 3em; 

}



.card4__body {
  padding: 1rem;
  display: flex;
  flex-direction: column;
  gap: .5rem;
}


.tag {
  align-self: flex-start;
  padding: .25em .75em;
  border-radius: 1em;
  font-size: .75rem;
}

.tag + .tag {
  margin-left: .5em;
}

.tag-blue {
  background: #56CCF2;
background: linear-gradient(to bottom, #2F80ED, #56CCF2);
  color: #fafafa;
}

.tag-brown {
  background: #D1913C;
background: linear-gradient(to bottom, #FFD194, #D1913C);
  color: #fafafa;
}

.tag-red {
  background: #cb2d3e;
background: linear-gradient(to bottom, #ef473a, #cb2d3e);
  color: #fafafa;
}

.card4__body h4 {
  font-size: 1.5rem;
  text-transform: capitalize;
}

.card4__footer {
  display: flex;
  padding: 1rem;
  margin-top: auto;
}

.user {
  display: flex;
  gap: .5rem;
}

.user__image {
  border-radius: 50%;
}

.user__info > small {
  color: #666;
}
</style>
    <div class="container">
        <div class="row">
          <div class="col-12  col-md-3" style="padding: 2% 3%;">
              <a class="btn" href="{{url('/blog/create')}}" role="button" style="width: 80%; color:white;background-color: royalblue"><span class="badge" style="padding: 14px 0px; font-size: medium;"><i class="fas fa-pencil-alt"></i> CREATE BLOG POST</span></a>
          </div>
        </div>
    </div>
    <div class="container">
      <div class="row">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

      </div>
      <div class="row">

            @foreach ($blogs as $blog)
           
            <a class="card4" href="/blog/show/{{$blog->id}}" style="text-decoration: none; color: black;">
              <div>
                <div class="card4__header">
                  <img src="https://source.unsplash.com/collection/1097769?{!!  rand(10,100); !!}&w=600&h=400" alt="card4__image" class="card4__image" width="600" height="200"
                  style="  max-width: 100%;
                  display: block;
                  object-fit: cover;">
                </div>
                <div class="card4__body">
                  <div class="row">
                    <div class="col-12 col-md-8">
                      <span class="tag tag-blue">Blog</span>
                    </div>
                    {{-- @Auth
                    @if ($blog->profile_id == Auth::user()->profile->id)
                    <div class="col-12 col-md-2">
                      <a href="/blog/{{$blog->id}}/edit" class="btn bg-warning btn-sm text-white">Edit</a>
                    </div>
                    <div class="col-12 col-md-2">
                      <a data-toggle="modal" data-target="#confirmDelete" class="btn bg-danger btn-sm text-white">Delete</a>
                    </div>
                    @endif
                    @endAuth --}}
                  </div>
                  
                  {{-- <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body" >
                          <h5 class="text-center">Are you sure you want to delete {{ $blog->title }} ?</h5>
                        </div>
                        <div class="modal-footer">
                          <form action="/blog/{{$blog->id}}/delete" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Yes, Delete Project</button>
                          </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div> --}}

                  <h4>{{$blog->title}}</h4>
                  <p>{!! Str::limit( strip_tags( $blog->content), 200 ) !!} </p>
                </div>
                <div class="card4__footer">
                  <div class="user">
                    <img src="https://avatars.dicebear.com/api/{!! ($blog->profile->gender == 'M')? 'male' : 'female'; !!}/:seed.svg" 
                    alt="user__image" class="user__image" style="width: 50px;height:50px">
                    <div class="user__info">
                      <h5>{{$blog->profile->firstName}}</h5>
                      <small>{{Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</small>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            @endforeach
      </div>
    </div>
        
</x-layouts.app>


       