<x-layouts.forum-nav>
<div class="col-7 col-md-7" style="margin-top: 150px;">
     
                
     <!------------------------------------------ posts ---------------------------------------->
         <div class="row forumPostPrototypeSolo">
             <div class="card col-12 col-md-12">
                 <div class="card-header">
                     <div class="row">
                         <h5 class="card-title col-12 col-md-8">POST TITLE</h5>                        
                         <h5 class=" col-md-4"><span class="badge badge-pill badge-primary">POST TOPIC</span></h5>                                
                     </div>
                     <div class="row">
                         <h6 class="col-12 col-md-4">POST AUTHOR</h5>                        
                         <h6 class="col-md-4">CREATED</h5>                                
                     </div>

                 </div>
                 <div class="card-body">
                     <p>semi content.
                         The :nth-child(n) selector matches every element that is the nth child, regardless of type, of its parent. n can be a number, a keyword, or a formula.Tip: Look at the :nth-of-type() selector to select the element that is the nth child, of a particular type, of its parent.
                         The :nth-child(n) selector matches every element that is the nth child, regardless of type, of its parent. n can be a number, a keyword, or a formula.Tip: Look at the :nth-of-type() selector to select the element that is the nth child, of a particular type, of its parent.
                         The :nth-child(n) selector matches every element that is the nth child, regardless of type, of its parent. n can be a number, a keyword, or a formula.Tip: Look at the :nth-of-type() selector to select the element that is the nth child, of a particular type, of its parent.
                         The :nth-child(n) selector matches every element that is the nth child, regardless of type, of its parent. n can be a number, a keyword, or a formula.Tip: Look at the :nth-of-type() selector to select the element that is the nth child, of a particular type, of its parent.
                     </p>
                     <hr class="rounded" style="margin: 0%;">
                     <div class="row" style="margin-top: 2%;">
                         <h6 class="col-6 col-md-3">Likes</h6>
                         <h6 class="col-6 col-md-3">Comments</h6>
                     </div>
                     <hr class="rounded" style="margin: 0% 0% 5% 0%;">
                     <div class="row">
                         <h6 class="col-12 offset-md-1 col-md-5">LOG IN OR REGISTER TO POST COMMENTS</h6>
                         <button class="col-12 col-md-2 btn btn-lg btn-primary" role="button">LOG IN</button>
                         <button class="col-12 offset-md-1 col-md-2 btn btn-lg btn-primary" role="button">REGISTER</button>
                     </div>
                     <hr class="rounded" style="margin: 0% 0% 5% 0%;">

                     <div class="row forumPostCreate">
                         <div class="card col-12 col-md-12">
                             <div class="card-header row" style="padding-top: 25px;">
                                 <h5 class="card-title col-12 col-md-8">COMMENT AS (YOUR NAME)</h5>
                             </div>
                             <div class="card-body">
                                 <form method="POST" action="">
                                     <div class="form-group">
                                         <div class="bg-light">
                                             <button class="btn" type="button"><i class="fa fa-bold"></i></button>
                                             <button class="btn" type="button"><i class="fa fa-italic"></i></button>
                                             <button class="btn" type="button"><i class="far fa-file-image"></i></button>
 
                                         </div>
                                         <textarea class="form-control" name="formBody" id="formBody" placeholder="CONTENT" rows="3"></textarea>
                                     </div>
                                     <div class="form-group">
                                         <button type="submit" class="btn btn-primary">COMMENT</button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
 
                     <!-- post comments-->
                     <div class="row postComments">
                         <div class="card col-12 col-md-12">
                             <div class="card-header">
                                 <div class="row">
                                     <h6 class="col-12 col-md-4">AUTHOR</h6>
                                     <h6 class="col-md-4">TIME</h6>        
                                 </div>
                             </div>
                             <div class="card-body">
                                 comment goes here
                                 <br>
                                 <div class="row" style="margin-top: 2%;">
                                     <h6 class="col-6 col-md-3">Likes</h6>
                                     <button class="col-6 col-md-3 btn reply-btn" type="button" onclick="replyToggle()" name="replyButton">REPLY</button>
                                 </div>
                                 <div class="row forumPostreply">
                                     <div class="card col-12 col-md-12">
                                         <div class="card-header row" style="padding-top: 25px;">
                                             <h5 class="card-title col-12 col-md-8">REPLY AS (YOUR NAME)</h5>
                                         </div>
                                         <div class="card-body">
                                             <form method="POST" action="">
                                                 <div class="form-group">
                                                     <div class="bg-light">
                                                         <button class="btn" type="button"><i class="fa fa-bold"></i></button>
                                                         <button class="btn" type="button"><i class="fa fa-italic"></i></button>
                                                         <button class="btn" type="button"><i class="far fa-file-image"></i></button>
             
                                                     </div>
                                                     <textarea class="form-control" name="formBody" id="formBody" placeholder="CONTENT" rows="3"></textarea>
                                                 </div>
                                                 <div class="form-group">
                                                     <button type="submit" class="btn btn-primary">REPLY</button>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
 
                                 <div class="row">
                                     <div class="card col-12 col-md-12">
                                         <div class="card-header">
                                             <div class="row">
                                                 <h6 class="col-12 col-md-4">AUTHOR</h6>
                                                 <h6 class="col-md-4">TIME</h6>        
                                             </div>
                                         </div>
                                         <div class="card-body">
                                             comment goes here
                                             <br>
                                             <div class="row" style="margin-top: 2%;">
                                                 <h6 class="col-6 col-md-3">Likes</h6>
                                                 <button class="col-6 col-md-3 btn reply-btn" type="button" onclick="replyToggle()" name="replyButton">REPLY</button>
                                             </div>
                                             <div class="row forumPostreply">
                                                 <div class="card col-12 col-md-12">
                                                     <div class="card-header row" style="padding-top: 25px;">
                                                         <h5 class="card-title col-12 col-md-8">REPLY AS (YOUR NAME)</h5>
                                                     </div>
                                                     <div class="card-body">
                                                         <form method="POST" action="">
                                                             <div class="form-group">
                                                                 <div class="bg-light">
                                                                     <button class="btn" type="button"><i class="fa fa-bold"></i></button>
                                                                     <button class="btn" type="button"><i class="fa fa-italic"></i></button>
                                                                     <button class="btn" type="button"><i class="far fa-file-image"></i></button>
                         
                                                                 </div>
                                                                 <textarea class="form-control" name="formBody" id="formBody" placeholder="CONTENT" rows="3"></textarea>
                                                             </div>
                                                             <div class="form-group">
                                                                 <button type="submit" class="btn btn-primary">REPLY</button>
                                                             </div>
                                                         </form>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="row">
                                                 <div class="card col-12 col-md-12">
                                                     <div class="card-header">
                                                         <div class="row">
                                                             <h6 class="col-12 col-md-4">AUTHOR</h6>
                                                             <h6 class="col-md-4">TIME</h6>        
                                                         </div>
                                                     </div>
                                                     <div class="card-body">
                                                         comment goes here
                                                         <br>
                                                         <div class="row" style="margin-top: 2%;">
                                                             <h6 class="col-6 col-md-3">Likes</h6>
                                                             <button class="col-6 col-md-3 btn reply-btn" type="button" onclick="replyToggle()" name="replyButton">REPLY</button>
                                                         </div>
                                                         <div class="row forumPostreply">
                                                             <div class="card col-12 col-md-12">
                                                                 <div class="card-header row" style="padding-top: 25px;">
                                                                     <h5 class="card-title col-12 col-md-8">REPLY AS (YOUR NAME)</h5>
                                                                 </div>
                                                                 <div class="card-body">
                                                                     <form method="POST" action="">
                                                                         <div class="form-group">
                                                                             <div class="bg-light">
                                                                                 <button class="btn" type="button"><i class="fa fa-bold"></i></button>
                                                                                 <button class="btn" type="button"><i class="fa fa-italic"></i></button>
                                                                                 <button class="btn" type="button"><i class="far fa-file-image"></i></button>
                                     
                                                                             </div>
                                                                             <textarea class="form-control" name="formBody" id="formBody" placeholder="CONTENT" rows="3"></textarea>
                                                                         </div>
                                                                         <div class="form-group">
                                                                             <button type="submit" class="btn btn-primary">REPLY</button>
                                                                         </div>
                                                                     </form>
                                                                 </div>
                                                             </div>
                                                         </div>

                                                     </div>
                                                 </div>
                                             </div>
                     
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row postComments">
                         <div class="card col-12 col-md-12">
                             <div class="card-header">
                                 <div class="row">
                                     <h6 class="col-12 col-md-4">AUTHOR</h6>
                                     <h6 class="col-md-4">TIME</h6>        
                                 </div>
                             </div>
                             <div class="card-body">
                                 comment goes here
                                 <br>
                                 <div class="row" style="margin-top: 2%;">
                                     <h6 class="col-6 col-md-3">Likes</h6>
                                     <button class="col-6 col-md-3 btn reply-btn" type="button" onclick="replyToggle()" name="replyButton">REPLY</button>
                                 </div>
                                 <div class="row forumPostreply">
                                     <div class="card col-12 col-md-12">
                                         <div class="card-header row" style="padding-top: 25px;">
                                             <h5 class="card-title col-12 col-md-8">REPLY AS (YOUR NAME)</h5>
                                         </div>
                                         <div class="card-body">
                                             <form method="POST" action="">
                                                 <div class="form-group">
                                                     <div class="bg-light">
                                                         <button class="btn" type="button"><i class="fa fa-bold"></i></button>
                                                         <button class="btn" type="button"><i class="fa fa-italic"></i></button>
                                                         <button class="btn" type="button"><i class="far fa-file-image"></i></button>
             
                                                     </div>
                                                     <textarea class="form-control" name="formBody" id="formBody" placeholder="CONTENT" rows="3"></textarea>
                                                 </div>
                                                 <div class="form-group">
                                                     <button type="submit" class="btn btn-primary">REPLY</button>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div>

                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>

         

 </div>
 <div class="col-md-2" style="margin-top: 150px;">
         <div class="card" id="communityList" >
             <div class="card-header">
                 <h5 class="card-title">SPORTS</h5>
                 <button class="btn btn-lg col-md">
                         <span class="badge badge-pill badge-danger">JOIN</span>
                 </button>
             </div>
             <div class="card-body">
                 <h6>CREATED: </h6>
                 <h6>MEMBERS: </h6>
                 <h6>TOTAL POSTS: </h6><br>
                 <p>
                     This is a sports community where there are discussions related to different topics of sports.<br>
                     This community has the following topics
                 </p>
                 <h6>TOPICS</h6>
                 <ul class="list-inline">
                     <li class="list-inline-item"><a href="#">Cricket</a></li>
                     <li class="list-inline-item"><a href="#">Lionel Messi</a></li>
                     <li class="list-inline-item"><a href="#">Olympics</a></li>
                     <li class="list-inline-item"><a href="#">Paralympics</a></li>
                 </ul>
             </div>
         </div>
 </div>

</x-layouts.forum-nav>
