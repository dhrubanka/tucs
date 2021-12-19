<style>
.badge-green{
    color: green ;
    border-style: solid; 
    border-radius: 10px;
    padding: 5px 15px 5px 15px; 
     border-width: 2px;
     display: inline;
}
.badge-blue{
    color: blue ;
    border-style: solid; 
    border-radius: 10px;
    padding: 5px 15px 5px 15px; 
     border-width: 2px;
     display: inline;
}
.badge-red{
    color: red ;
    border-style: solid; 
    border-radius: 10px;
    padding: 5px 15px 5px 15px; 
     border-width: 2px;
     display: inline;
}
</style>
<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    @if($role=="student")
    <div class="badge-green">
        STUDENT
    </div>
    @elseif($role=="alumni")
    <div class="badge-blue">
        ALUMNI
    </div>
    @elseif($role=="professor")
    <div class="badge-red">
        FACULTY
    </div>
    @endif
</div>