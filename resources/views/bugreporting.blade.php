<x-layouts.app>
    <div class="container card" style="padding: 1em; width: 70%">

        <div class="row">
            <div class="text-center">
                <h2>Report a <b>Bug</b></h2>
            </div>

        </div>
<hr>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form method="POST" action="/report-bug/store">
        @csrf

        <div class="form-row">
            <div class="mb-3">
                <label for="inputName4">Module Name</label>
                <select class="form-select" aria-label="Default select example" name="module_name">
                    <option selected>Open this select menu</option>
                    <option value="Home Page">Home Page</option>
                    <option value="Community Module">Community Module</option>
             
                    <option value="Blog Module">Blog Module</option>
                    <option value="Connect Module">Connect Module</option>
                    <option value="Project Module">Project Module</option>
                    <option value="Events">Events</option>
                    <option value="Others">Others</option>
                  </select>

            </div>
        </div>
              <div class="mb-3">
                <label for="description" class=" col-form-label">Bug Description</label>
                 
                <textarea name="description" class="form-control " id="description" rows="5">
                </textarea>
               
            </div>

        <div class="row">
            <div class="text-center">
                <button type="submit" class="btn btn-primary text-white">Report</button>
            </div>
        </div>

    </form>

</div>
</div>
</div>
</x-layouts.app>