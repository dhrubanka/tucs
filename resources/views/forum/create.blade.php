<x-layouts.forum-nav>

<div class="col-7 col-md-7" style="margin-top: 150px;">
     
                
     <!------------------------------------------ posts ---------------------------------------->
         <div class="row forumPostCreate">
             <div class="card col-12 col-md-12">
                 <div class="card-header row" style="padding-top: 25px;">
                     <h5 class="card-title col-12 col-md-8">CREATE A POST</h5>
                     <form class="col-md-4" method="POST" action="">
                         <select class="form-select col-md-12">
                             <option selected>CHOOSE A COMMUNITY</option>
                             <option value="SPORTS">SPORTS</option>
                         </select>
                     </form>                    
                 </div>
                 <div class="card-body">
                     <form method="POST" action="">
                         <div class="form-group">
                           <input class="form-control" type="text" name="formTitle" id="formTitle" class="form-control" placeholder="TITLE">
                         </div>
                         <div class="form-group">
                             <div class="bg-light">
                                 <button class="btn" type="button"><i class="fa fa-bold"></i></button>
                                 <button class="btn" type="button"><i class="fa fa-italic"></i></button>
                                 <button class="btn" type="button"><i class="far fa-file-image"></i></button>

                             </div>
                             <textarea class="form-control" name="formBody" id="formBody" placeholder="CONTENT" rows="3"></textarea>
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn btn-primary">POST</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>

         

 </div>


</x-layouts.forum-nav>