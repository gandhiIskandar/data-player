<div class="row">

    <div class="col-lg-6">
       
        <div class="card">
          <div class="card-header">
            <h5>Edit Data Profile</h5>
          </div>
          <div class="card-body">
            <x-partials.flash-message />
            <form wire:submit='updateDataUser'>
              <h5 class="mb-3">A. Personal Info:</h5>
              <div class="mb-3 row">
                <label class="col-lg-4 col-form-label text-lg-end">Name:</label>
                <div class="col-lg-6">
                  <input type="text" class="form-control" wire:model='name' placeholder="Enter full name" {{ in_array(2,session('privileges')) ? "" : "disabled" }}/>
                  {{-- <small class="form-text text-muted">Please enter your full name</small> --}}
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-lg-4 col-form-label text-lg-end">Email:</label>
                <div class="col-lg-6">
                  <input type="email" class="form-control" wire:model='email' placeholder="Enter email" {{ in_array(2,session('privileges')) ? "" : "disabled" }}/>
                  {{-- <small class="form-text text-muted">Please enter your Email</small> --}}
                </div>
              </div>
              <hr class="my-4" />
              <h5 class="mb-3">B. Role Info:</h5>
              <div class="mb-3 row">
                <label class="col-lg-4 col-form-label text-lg-end">Role:</label>
                <div class="col-lg-6">
                  <input type="email" class="form-control" wire:model='role' disabled/>
                  {{-- <small class="form-text text-muted">Please enter your Final Degree</small> --}}
                </div>
              </div>

          
              <div class="row mt-3">
            
                <div class="col-6 text-center">
                    <button 
                    data-pc-animate="fade-in-scale"
                    type="button"
                    class="btn btn-info"
                    data-bs-toggle="modal"
                    data-bs-target="#changePassword" style="width: 200px;" type="button" {{ in_array(1,session('privileges')) ? "" : "disabled" }}>Ganti Password</button>
                
                </div>
               
                <div class="col-6 text-center">
                    <button 
                    data-pc-animate="fade-in-scale"
                    type="submit"
                    class="btn btn-primary" style="width: 200px;" type="button" {{ in_array(2,session('privileges')) ? "" : "disabled" }}>Update Data</button>
                
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
   

<livewire:modal-change-password/>
</div>
