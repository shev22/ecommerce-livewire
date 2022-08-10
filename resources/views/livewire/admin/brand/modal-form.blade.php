
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Brands</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form wire:submit.prevent="storeBrand">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="">Brand Name</label>
                    <input type="text" wire:model.defer="name" class="form-control">
                    {{-- @error('name') <small class="tect-danger">{{ $message }}</small>@enderror
                        
                    @enderror --}}
                </div>
                <div class="mb-3">
                    <label for="">Brand Slug</label>
                    <input type="text"  wire:model.defer="slug" class="form-control">
                    {{-- @error('slug') <small class="tect-danger">{{ $message }}</small>@enderror --}}
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <input type="checkbox"  wire:model.defer="status"/> Checked=Hidden, Un-checked= Visible
                    {{-- @error('status') <small class="tect-danger">{{ $message }}</small>@enderror --}}
                </div>
                    ...
            </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>



  
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Brands</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form wire:submit.prevent="updateBrand">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="">Brand Name</label>
                    <input type="text" wire:model.defer="name" class="form-control">
                    {{-- @error('name') <small class="tect-danger">{{ $message }}</small>@enderror
                        
                    @enderror --}}
                </div>
                <div class="mb-3">
                    <label for="">Brand Slug</label>
                    <input type="text"  wire:model.defer="slug" class="form-control">
                    {{-- @error('slug') <small class="tect-danger">{{ $message }}</small>@enderror --}}
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <input type="checkbox"  wire:model.defer="status" /> Checked=Hidden, Un-checked= Visible
                    {{-- @error('status') <small class="tect-danger">{{ $message }}</small>@enderror --}}
                </div>
                    ...
            </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
      </div>
    </div>
  </div>







  <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Brand delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <form wire:submit.prevent="destroyBrand">

            <div class="modal-body">
                <h6>Are you sure you wanna delete?</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Yes, Delete</button>
            </div>
        </form>
    </div>
</div>
</div>