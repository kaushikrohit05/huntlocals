<div class="search pt-3">
    <div class="container">
      <form action="/search" method="POST" >
        @csrf
      <div class="row">
        <div class="col-md-6"><div class="mb-3"><select class="form-select" aria-label="Default select" name="category">
           
          @foreach ($search_categories as $category ) 
          <option value="{{ $category->id }}" @if (Session('ses_Category')==$category->id)
            selected
          @endif>{{ $category->category }}</option>
          @endforeach 
        </select></div></div>
        <div class="col-md-6"><div class="mb-3"><input type="text" class="form-control" aria-label="Default select" name="keyword" placeholder="Search Here..." value="@if (Session('ses_keyword')){{ Session('ses_keyword') }}@endif" />
         
           
         </div></div>
      </div>
      <div class="row">
        <div class="col-md-6"><div class="mb-3"><select class="form-select" aria-label="Default select" name="region"  id="region" >
          <option value="0">All Regions</option>
          @foreach ($search_locations as $location ) 
          <option value="{{ $location->id }}" @if (Session('ses_region')==$location->id)
            selected
          @endif>{{ $location->location }}</option>
          @endforeach 
           
        </select></div></div>
        <div class="col-md-4"><div class="mb-3"><select class="form-select" aria-label="Default select" name="location" id="location">
          <option value="0" parentid="0">All Locations</option>
          @foreach ($search_child_locations as $child_location ) 
          <option value="{{ $child_location->id }}" @if (Session('ses_location')==$child_location->id)
            selected
          @endif  parentid="{{ $child_location->parent }}">{{ $child_location->location }}</option>
          @endforeach 
        </select></div></div>
        <div class="col-md-2"><div  class="mb-3">
          <button class="btn btn-primary" type="submit">Submit</button>
          
        </div> </div>
      </div>
      </form>
    </div>
  </div>