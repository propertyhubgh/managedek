<div class="row m-auto">

    <div wire:offline>
        You are now offline.
    </div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="col">
    <div class="card text-dark bg-warning mb-3" >
        <div class="card-header">Photocopy Total</div>
        <div class="card-body">
            <h5 class="card-title">{{$photocopycount}} photocopies done ¢{{$photocopy}} earned.</h5>
            <a class="badge badge-pill badge-primary" wire:click="refreshPhotocopy">Refresh</a>
        </div>
    </div>
    </div>

    <div class="col">
    <div class="card justify-content-center text-light bg-info mb-3" >
        <div class="card-header">Web Design Total</div>
        <div class="card-body">
        <h5 class="card-title">{{$webdesigncount}} web-designs done ¢{{$webdesign}} earned.</h5>
            <a class="badge badge-pill badge-primary" wire:click="refreshWebdesign">Refresh</a>
        </div>
    </div>
    </div>
    
</div>
